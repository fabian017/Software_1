/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */

package Clases;

import java.util.Arrays;
import java.util.Scanner;

/**
 *
 * @author FABIAN <fabian.jovalle at gmail.com>
 */
public class Main {

    /**
     *
     * @param args
     */
    public static void main(String[] args) {
        Scanner esc = new Scanner(System.in);
        int c,p; 
        String np;
        System.out.println("Ingrese cantidad de postes: ");
        p = esc.nextInt() ;
        Poste vector[] = new Poste[p+1];
        vector[0] = new Poste(0,null,null);
        for(int j=1;j<=p;j++){
            System.out.println("Ingrese nombre del poste: ");
            np = esc.next();
            System.out.println("Ingrese capacidad del poste: ");
            c = esc.nextInt() ;
            if ((c == 5) || (c == 8)){
                
                Componente[] arr = new Componente[c];
                for(int i=0;i<c;i++){
                   
                    String post= "arr"+j;

                    System.out.println("Elegir componente: ");
                    System.out.println("1. Transformador");
                    System.out.println("2. Relay");
                    System.out.println("3. Linea Alta tension");
                    System.out.println("4. Linea Media tension");
                    int e = esc.nextInt();
                    switch(e){
                        case 1 -> {
                            String name = "T"+j+"-"+i;
                            arr[i] = new Transformador(name);
                        }
                        case 2 -> {
                            String name1 = "R"+j+"-"+i;
                            arr[i] = new Relay(name1);
                        }
                        case 3 -> {
                            String name2 = "LA"+j+"-"+i;
                            arr[i] = new LineaAltaTension(name2);
                        }
                        case 4 -> {
                            String name3 = "LM"+j+"-"+i;
                            arr[i] = new LineaMediaTension(name3);
                        }
                        default -> {
                        }

                    }

                }
                vector[j] = new Poste(c,arr,np);
                
                System.out.println(vector[j]+":" + vector[j].toString()+ " Conectado con: "+ vector[j-1].getNombre());    
            
            }  
        }     
        }
    }

