from fastapi import FastAPI
from fastapi.middleware.cors import CORSMiddleware
from pydantic import BaseModel
import random

app = FastAPI()

app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

class PasswordRequest(BaseModel):
    taille: int
    mode: int


@app.post("/api/password")
def generatePassword(req: PasswordRequest):

    lettre = "azertyuiopqsdfghjklmwxcvbn" + "AZERTYUIOPQSDFGHJKLMWXCVBN"
    lettreEtNumero = lettre + "1234567890"
    lettreNumeroCaractere = lettreEtNumero + "?&/:!§$%^>+-*"
    caracteres = "gefrhteggeffezhrst"


    match req.mode:
        case 1:
            caracteres = lettre
        case 2:
            caracteres = lettreEtNumero
        case 3:
            caracteres = lettreNumeroCaractere
        case _:
            print("Type de mot de passe incorrect")


    password = ''.join(random.choice(caracteres) for _ in range(req.taille))
    return {"password": password}