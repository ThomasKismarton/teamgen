# Imports required resources
import mysql.connector
import csv
from flask import Flask
from flask_restful import Resource, Api

# Sets up the application
app = Flask(__name__)
api = Api(app)

# Set up MySql connection
mydb = mysql.connector.connect(
    user="root",
    password="pwd",
    host="mysql",
    port="3306",
    database="teams"
)

cursor = mydb.cursor()

class Example(Resource):
    def get(self):
        return {
            'Greetings': ['hello', 'heya', 'hola', 'whats poppin']
        }

class Test(Resource):
    def get(self):
        cursor.execute('Select * FROM pokemon WHERE IsFullyEvolved = "0" \n ORDER BY RAND() \n LIMIT 6;')
        poke = cursor.fetchall()
        pokelist = []
        for pokelement in poke:
            tempoke = {
                'PokeID': pokelement[0],
                'Name': pokelement[1],
                'Type1': pokelement[2],
                'Type2': pokelement[3],
                'IsFullyEvolved': pokelement[4],
                'IsLegendary': pokelement[5]
            }
            pokelist.append(tempoke)
        return {
            'Pokemon': pokelist
        }

api.add_resource(Example, '/')
api.add_resource(Test, '/test_me')

if __name__ == "__main__":
    app.run(debug=True, port=80, host='0.0.0.0')