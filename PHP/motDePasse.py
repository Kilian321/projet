import random
import sys



def generer_mot_de_passe(type_mot_de_passe, taille):

   #variables
    lettre = "azertyuiopqsdfghjklmwxcvbn" + "AZERTYUIOPQSDFGHJKLMWXCVBN"
    lettreEtNumero = lettre + "1234567890"
    lettreNumeroCaractere = lettreEtNumero + "?&/:!§$%^>+-*"

   #swicth 
    match type_mot_de_passe:
        case '1':
            caracteres = lettre
        case '2':
            caracteres = lettreEtNumero
        case '3':
            caracteres = lettreNumeroCaractere
        case _:
            print("Type de mot de passe incorrect")

   #variable du mot de passe 
    mot_de_passe = ''.join(random.choice(caracteres) for _ in range(taille))
    return mot_de_passe

#demande du type 
""" type_mot_de_passe = input("Quel type de mot de passe voulez-vous générer ? alphabetique = 1, alphanumerique = 2, tout = 3 : ")

#demande de la longueur
taille = int(input("Combien de caractères ? : "))
if taille < 8 :
    taille=8
    print("La taille minimum est de 8, donc le mot de passe contiendra 8 caractères") """


#génération du mot de passe en fonction des paramètres
mot_de_passe = generer_mot_de_passe(sys.argv[1], int(sys.argv[2]))
print(mot_de_passe)
