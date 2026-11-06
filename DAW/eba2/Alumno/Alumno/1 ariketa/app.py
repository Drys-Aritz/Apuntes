import os
from datetime import datetime
from flask import Flask, jsonify
import redis

REDIS_HOST = os.getenv("REDIS_HOST", "redis")
REDIS_PORT = int(os.getenv("REDIS_PORT", "6379"))

r = redis.Redis(host=REDIS_HOST, port=REDIS_PORT, decode_responses=True)

app = Flask(__name__)

@app.get("/")
def home():
    return jsonify(status="ok", service="api", redis_host=REDIS_HOST, redis_port=REDIS_PORT)

@app.post("/hit")
def hit():
    # Incrementa contador en Redis
    count = r.incr("hits")

    # Escribe log en volumen lógico ./data
    os.makedirs("data", exist_ok=True)
    with open("data/hits.log", "a", encoding="utf-8") as f:
        f.write(f"{datetime.now().isoformat()} hits={count}\n")

    return jsonify(message="contador incrementado", hits=count)

if __name__ == "__main__":
    # Flask escuchando en la red del contenedor
    app.run(host="0.0.0.0", port=5000)
