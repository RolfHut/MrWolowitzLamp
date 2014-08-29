
//This code will switch on, or off pin D7, which at my home activates a lamp. It will switch when the "switchLamp" command is received from the spark cloud. It will also show the text received with the command on a LCD display that is assumed to be attached to pins D0,D1,D2,D3,D4 and D5.

// This #include statement was automatically added by the Spark IDE.
#include "LiquidCrystal/LiquidCrystal.h"

bool debug = FALSE;

int lampPin = D7;
int lampStatus = HIGH;
String lampStatusString = "on";

LiquidCrystal *lcd;


void setup() {
    //start Serial communication for debugging
    if (debug){
        Serial.begin(9600);
    }

    //start LCD display
    lcd = new LiquidCrystal(D0, D1, D2, D3, D4, D5); //Make sure to update these to match how you've wired your pins
    // set up the LCD's number of columns and rows: 
    lcd->begin(16, 2);
    // Print a message to the LCD.
    lcd->print("Hello, Sparky!");

    
    //set lamp
    pinMode(lampPin,OUTPUT);
    digitalWrite(lampPin,lampStatus);
    
    //define communication with cloud
    Spark.function("switchLamp",switchLampFunc);
    Spark.variable("lampStatus",&lampStatusString, STRING);
    
    if (debug){
        Serial.println("started up");
    }
    
}

void loop() {
    digitalWrite(lampPin,lampStatus);
    delay(10);
    //do nothing
}

int switchLampFunc(String command){
    lcd->clear();
    lcd->setCursor(0,0);
    lcd->print(command);
    lcd->setCursor(0,1);
    lcd->print("zet de lamp ");
    
    if (lampStatus == HIGH)
    {
        lampStatus=LOW;
        lcd->print("uit");
    }
    else if (lampStatus == LOW)
    {
        lampStatus=HIGH;
        lcd->print("aan");
    }
    else
    {
        return -1;
    }
    
    //set the lamp
    digitalWrite(lampPin,lampStatus);
    
    if (debug){
        Serial.print("received arguments: ");
        Serial.println(command);
    }

    return 1;
}
