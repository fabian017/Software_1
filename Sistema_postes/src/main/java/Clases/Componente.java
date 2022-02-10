/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */

package Clases;

/**
 *
 * @author FABIAN <fabian.jovalle at gmail.com>
 */
public abstract class Componente {
    //ATRIBUTOS
    private String nombre;
    
    //CONSTRUCTOR
    public Componente(){
        nombre = "";
    }
    
    public Componente(String nombre) {
        this.nombre = nombre;
    }
    
    //GETTERS AND SETTERS
    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }
     
    //METODOS

    @Override
    public String toString() {
        return  "nombre: " + nombre;
    }
    
    
}
