/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */

package Composite;

/**
 *
 * @author FABIAN <fabian.jovalle at gmail.com>
 */
public class Soldado implements Elemento{
    private int id;
    private String nombre;
    
    public void nombreElemento() {
        System.out.println(getClass().getSimpleName());
    }

    public Soldado(int id, String nombre) {
        this.id = id;
        this.nombre = nombre;
    }
    

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }
}
