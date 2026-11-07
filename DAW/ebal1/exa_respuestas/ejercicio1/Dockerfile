FROM python:3.11-slim

WORKDIR /app

COPY procesar_texto.py /app/

RUN pip install --no-cache-dir nltk

ENTRYPOINT ["python", "procesar_texto.py"]