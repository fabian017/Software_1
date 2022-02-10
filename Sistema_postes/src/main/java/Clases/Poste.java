/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Clases;

/**
 *
 * @author FABIAN <fabian.jovalle at gmail.com>
 */
public class Poste {
    //ATRIBUTOS
    private int capacidad;
    private Componente[] component;
    private String nombre;
    
    //CONSTRUCTOR

    public Poste(int capacidad, Componente[] component, String nombre) {
        this.capacidad = capacidad;
        this.component = component;
        this.nombre = nombre;
    }

    
    public int getCapacidad() {
        return capacidad;
    }

    public void setCapacidad(int capacidad) {   
        this.capacidad = capacidad;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

   

    public Componente[] getComponent() {
        return component;
    }

    public void setComponent(Componente[] component) {
        this.component = component;
    }

    

    @Override
    public  String toString() {
        for(Componente componente:component){
            System.out.println(componente.toString());
        }
        return  ("capacidad: " + capacidad );
       
    }
    
    
}
