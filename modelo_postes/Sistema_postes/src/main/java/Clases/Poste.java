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
    private Componente componente;
    
    //CONSTRUCTOR

    public Poste(int capacidad, Componente componente) {
        this.capacidad = capacidad;
        this.componente = componente;
    }
    
    //GETTERS AND SETTERS

    public int getCapacidad() {
        return capacidad;
    }

    public void setCapacidad(int capacidad) {
        this.capacidad = capacidad;
    }

    public Componente getComponente() {
        return componente;
    }

    public void setComponente(Componente componente) {
        this.componente = componente;
    }
    //METODOS
    public void conectarPostes(Poste poste){
        
    }
    
    
    
    @Override
    public String toString() {
        return "Capacidad: " + capacidad;
    }
    
}
