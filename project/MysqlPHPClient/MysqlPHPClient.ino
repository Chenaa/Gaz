#include<SPI.h>
#include<Ethernet.h>

byte mac[] = {0x00, 0xAA, 0xBB, 0xCC, 0xDE, 0x02};
byte servidor[] = {192,168,100,74};
#define portaHTTP 80

EthernetClient clienteArduino;
// the setup routine runs once when you press reset:

float sensor1 = 0;
float sensor2 = 0;
float sensor3 = 0;

void setup() {
  // initialize serial communication at 9600 bits per second:
  Serial.begin(9600);
  Ethernet.begin(mac);

  if(Ethernet.begin(mac) == 0){
    Serial.println("Falha ao conectar a rede");
    Ethernet.begin(mac);
    
    }

  Serial.println("Conectado a read, no ip:");
  Serial.println(Ethernet.localIP());
  
}

// the loop routine runs over and over again forever:
void loop() {
  if(clienteArduino.available()){
    char dadosRetornados = clienteArduino.read();
    Serial.print(dadosRetornados);
    }
  if(!clienteArduino.connected()){
    clienteArduino.stop();

    char comando = Serial.read();

    if(comando == '1'){
      sensor1++;
      sensor2++;
      sensor3++;

      Serial.println("Conectando ao servidor..");
      if(clienteArduino.connected(servidor, poraHTTP)){
        clienteArduino.println("GET /arduino/teste.php HTTP/1.0");
        clienteArduino.println("HOST: 192.168.100.74");
        clienteArduino.println();
        }else {
          Serial.println("Falha na conexao com servidor");
          
          
          }
      }
    
    }
    
  
}
