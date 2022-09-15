# Imports required resources
from xml.etree.ElementTree import tostring
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

def typeGet(primary, secondary):
        if (primary == "random"):
            if (secondary == "random"):
                return " "
            else:
                return "WHERE Type2 = \'" + secondary + "\'"
        elif (secondary == "random"):
            return "WHERE Type1 = \'" + primary + "\'"
        else:
            return "WHERE Type2 IN (\'" + primary + "\'," + "\'" + secondary + "\')" + " OR Type1 = \'" + primary + "\' "


class Example(Resource):
    def get(self):
        return {
            'Greetings': ['hello', 'heya', 'hola', 'whats poppin']
        }

class Test(Resource):
    def get(self, teamsize, primary, secondary):
        types = typeGet(primary, secondary)
        cursor.execute("Select * FROM pokemon " + types + "\n ORDER BY RAND() \n LIMIT " + teamsize + ";")
        poke = cursor.fetchall()
        pokelist = []
        for pokelement in poke:
            pokestats = {
                'PokeID': pokelement[0],
                'Name': pokelement[1],
                'Type1': pokelement[2],
                'Type2': pokelement[3],
                'IsFullyEvolved': pokelement[4],
                'IsLegendary': pokelement[5]
            }
            pokelist.append(pokestats)
        return {
            'Pokemon': pokelist
        }

api.add_resource(Example, '/')
api.add_resource(Test, '/teamgen/<teamsize>/<primary>/<secondary>')

if __name__ == "__main__":
    app.run(debug=True, port=80, host='0.0.0.0')
