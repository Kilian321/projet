from fastapi import FastAPI
import random

app = FastAPI()

@app.get("/api/test")
def testfunc(taille,mode):
    alpha = "abcer"
    return {"mot": taille * random.choice(alpha)}
