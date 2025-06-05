let equipo1 = {
    id:[],
    nombre:[],
    imagen:[],
    ataque:[0,0,0],
    defensa:[0,0,0]
}
let equipo2 = {
    id:[],
    nombre:[],
    imagen:[],
    ataque:[0,0,0],
    defensa:[0,0,0]
}
let dado1 = 0
let dado2 = 0
let dado3 = 0
let dado4 = 0

let usos1 = 0
let usos2 = 0

let MejoresDados1 = [0,0]
let MejoresDados2 = [0,0]

function dados() {
    return Math.floor(Math.random() * 6) +1;
}

function aleatorio() {
    return Math.floor(Math.random() * 1025) + 1;
  }

document.getElementById('ComenzarBatalla').disabled = true

document.getElementById('dado1').addEventListener('click',
    async function () {
        document.getElementById('ComenzarBatalla').disabled = true

        if (usos1 < 3) {
            dado1 = dados()
            dado2 = dados()

            document.getElementById('valor1').innerHTML = dado1
            document.getElementById('valor2').innerHTML = dado2

            usos1++

            if ((dado1 + dado2)>(MejoresDados1[0]+MejoresDados1[1])) {
                MejoresDados1[0] = dado1 
                MejoresDados1[1] = dado2
            }

            if (usos1 === 3) {
                this.disabled = true
                document.getElementById('valor1').innerHTML = MejoresDados1[0]
                document.getElementById('valor2').innerHTML = MejoresDados1[1]
            }

            if ((usos1===3) && (usos2===3)) {
            document.getElementById('ComenzarBatalla').disabled = false
            }
        }
    }
)

document.getElementById('dado2').addEventListener('click',
    async function () {
        document.getElementById('ComenzarBatalla').disabled = true

        if (usos2 < 3) {
            dado3 = dados()
            dado4 = dados()

            document.getElementById('valor3').innerHTML = dado3
            document.getElementById('valor4').innerHTML = dado4

            usos2++

            if ((dado3 + dado4)>(MejoresDados2[0]+MejoresDados2[1])) {
                MejoresDados2[0] = dado3 
                MejoresDados2[1] = dado4
            }

            if (usos2 === 3) {
                this.disabled = true
                document.getElementById('valor3').innerHTML = MejoresDados2[0]
                document.getElementById('valor4').innerHTML = MejoresDados2[1]
            }

            if ((usos1===3) && (usos2===3)) {
            document.getElementById('ComenzarBatalla').disabled = false
            }
        }
    }
)

document.getElementById('ComenzarBatalla').addEventListener('click',

    async function () {

        document.getElementById('dado1').disabled = false
        document.getElementById('dado2').disabled = false
        usos1 = 0
        usos2 = 0

        equipo1.id[0] = aleatorio()
        equipo1.id[1] = aleatorio()
        equipo1.id[2] = aleatorio()
        
        equipo2.id[0] = aleatorio()
        equipo2.id[1] = aleatorio()
        equipo2.id[2] = aleatorio()

        let id = aleatorio();
        console.log(id)

        await Equipos1()
        await Equipos2()
        Ganador()
    })

    async function Equipos1() {
            for (let i = 0; i < 3; i++) {
                const response = await fetch(`https://pokeapi.co/api/v2/pokemon/` + equipo1.id[i])
                const data = await response.json()

                if (i === 0) {
                    equipo1.nombre[i] = document.getElementById('n1').innerHTML = (data.name)
                    equipo1.imagen[i] = document.getElementById('im1').src = (data.sprites.front_default)

                    for (let j = 0; j < data.stats.length; j++) {
                    if (data.stats[j].stat.name === 'attack') {
                        document.getElementById('a1').innerHTML = ('Ataque' + data.stats[j].base_stat)
                        equipo1.ataque[i] = data.stats[j].base_stat; 
                    }
                    if (data.stats[j].stat.name === 'defense') {
                        document.getElementById('d1').innerHTML = ('Defensa' + data.stats[j].base_stat)
                        equipo1.defensa[i] = data.stats[j].base_stat;
                    }
                }
            }
            if (i === 1) {
                    equipo1.nombre[i] = document.getElementById('n2').innerHTML = (data.name)
                    equipo1.imagen[i] = document.getElementById('im2').src = (data.sprites.front_default)

                    for (let j = 0; j < data.stats.length; j++) {
                    if (data.stats[j].stat.name === 'attack') {
                        document.getElementById('a2').innerHTML = ('Ataque' + data.stats[j].base_stat)
                        equipo1.ataque[i] = data.stats[j].base_stat; 
                    }
                    if (data.stats[j].stat.name === 'defense') {
                        document.getElementById('d2').innerHTML = ('Defensa' + data.stats[j].base_stat)
                        equipo1.defensa[i] = data.stats[j].base_stat;
                    }
                }
            }
            if (i === 2) {
                equipo1.nombre[i] = document.getElementById('n3').innerHTML = (data.name)
                equipo1.imagen[i]= document.getElementById('im3').src = (data.sprites.front_default)
                
                for (let j = 0; j < data.stats.length; j++) {
                    if (data.stats[j].stat.name === 'attack') {
                        document.getElementById('a3').innerHTML = ('Ataque' + data.stats[j].base_stat)
                        equipo1.ataque[i] = data.stats[j].base_stat; 
                    }
                    if (data.stats[j].stat.name === 'defense') {
                        document.getElementById('d3').innerHTML = ('Defensa' + data.stats[j].base_stat)
                        equipo1.defensa[i] = data.stats[j].base_stat;
                    }
                }    
                }
            }
        }
        async function Equipos2() {
            for (let i = 0; i < 3; i++) {
                const response = await fetch(`https://pokeapi.co/api/v2/pokemon/` + equipo2.id[i])
                const data = await response.json()

                if (i === 0) {
                    equipo2.nombre[i] = document.getElementById('n4').innerHTML = (data.name)
                    equipo2.imagen[i] = document.getElementById('im4').src = (data.sprites.front_default)

                    for (let j = 0; j < data.stats.length; j++) {
                    if (data.stats[j].stat.name === 'attack') {
                        document.getElementById('a4').innerHTML = ('Ataque' + data.stats[j].base_stat)
                        equipo2.ataque[i] = data.stats[j].base_stat; 
                    }
                    if (data.stats[j].stat.name === 'defense') {
                        document.getElementById('d4').innerHTML = ('Defensa' + data.stats[j].base_stat)
                        equipo2.defensa[i] = data.stats[j].base_stat;
                    }
                }
            }
            if (i === 1) {
                equipo2.nombre[i] = document.getElementById('n5').innerHTML = (data.name)
                equipo2.imagen[i] = document.getElementById('im5').src = (data.sprites.front_default)
                
                for (let j = 0; j < data.stats.length; j++) {
                    if (data.stats[j].stat.name === 'attack') {
                        document.getElementById('a5').innerHTML = ('Ataque' + data.stats[j].base_stat)
                        equipo2.ataque[i] = data.stats[j].base_stat; 
                    }
                    if (data.stats[j].stat.name === 'defense') {
                        document.getElementById('d5').innerHTML = ('Defensa' + data.stats[j].base_stat)
                        equipo2.defensa[i] = data.stats[j].base_stat;
                    }
                }
                }
                if (i === 2) {
                    equipo2.nombre[i] = document.getElementById('n6').innerHTML = (data.name)
                    equipo2.imagen[i] = document.getElementById('im6').src = (data.sprites.front_default)

                    for (let j = 0; j < data.stats.length; j++) {
                    if (data.stats[j].stat.name === 'attack') {
                        document.getElementById('a6').innerHTML = ('Ataque' + data.stats[j].base_stat)
                        equipo2.ataque[i] = data.stats[j].base_stat; 
                    }
                    if (data.stats[j].stat.name === 'defense') {
                        document.getElementById('d6').innerHTML = ('Defensa' + data.stats[j].base_stat)
                        equipo2.defensa[i] = data.stats[j].base_stat;
                    }
                }    
                }
            }
        }
        async function Ganador() {
            let Equipo1A=0
            let Equipo1D=0
            let Equipo2A=0
            let Equipo2D=0
            const maxLength = Math.min(3, equipo1.ataque.length, equipo2.ataque.length);

            console.log('Ataques y defensas antes de la suma:');
            console.log('Equipo 1 - Ataque:', equipo1.ataque, 'Defensa:', equipo1.defensa);
            console.log('Equipo 2 - Ataque:', equipo2.ataque, 'Defensa:', equipo2.defensa);
            for (let i = 0; i < 3; i++) {
                console.log(equipo1.ataque[i])
                Equipo1A += equipo1.ataque[i] || 0;
                Equipo1D += equipo1.defensa[i] || 0;

                Equipo2A += equipo2.ataque[i] || 0;
                Equipo2D += equipo2.defensa[i] || 0;
                
            }
            if ((Equipo1D - Equipo2A)>(Equipo2D - Equipo1A)) {
                document.getElementById('Ganador').innerHTML = ('Equipo Ganador')
                document.getElementById('Ganador2').innerHTML = ('Equipo Perdedor')
            }
            else if((Equipo2D - Equipo1A)>(Equipo1D - Equipo2A)) {
                document.getElementById('Ganador2').innerHTML = ('Equipo Ganador')
                document.getElementById('Ganador').innerHTML = ('Equipo Perdedor')
            }
            else {
                if ((MejoresDados1[0]+MejoresDados1[1])>(MejoresDados2[0]+MejoresDados2[1])) {
                    document.getElementById('Ganador').innerHTML = ('Equipo Ganador')
                    document.getElementById('Ganador2').innerHTML = ('Equipo Perdedor')
                }
                else if ((MejoresDados2[0]+MejoresDados2[1])>(MejoresDados1[0]+MejoresDados1[1])) {
                    document.getElementById('Ganador2').innerHTML = ('Equipo Ganador')
                    document.getElementById('Ganador').innerHTML = ('Equipo Perdedor')
                }
                else {
                    document.getElementById('Ganador2').innerHTML = ('Empate')
                    document.getElementById('Ganador').innerHTML = ('Empate')
                }
            }
            console.log("Equipo1 → A:", Equipo1A, "D:", Equipo1D);
            console.log("Equipo2 → A:", Equipo2A, "D:", Equipo2D);
            document.getElementById('ComenzarBatalla').disabled = true

            MejoresDados1 = [0,0]
            MejoresDados2 = [0,0]
        }