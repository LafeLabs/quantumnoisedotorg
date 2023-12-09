//BLACK:A0:AIR
//BROWN:A1:EARTH
//RED:A2:FIRE
//ORANGE:A3:WATER

  int air = 0;   //A0
  int earth = 0; //A1
  int fire = 0;  //A2
  int water = 0; //A3
  int aether = 0;
  void setup() {
      Serial.begin(115200);
  }
  
  void loop() {
    air = analogRead(A0);
    earth = analogRead(A1);
    fire = analogRead(A2);
    water = analogRead(A3);
    aether = fire - water; 
    Serial.print(air);
    Serial.print(",");
    Serial.print(earth);
    Serial.print(",");
    Serial.print(fire);
    Serial.print(",");
    Serial.println(water);
    
  
  // delay(1);
    
  }
