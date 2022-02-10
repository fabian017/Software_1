/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */

package Clases;

/**
 *
 * @author FABIAN <fabian.jovalle at gmail.com>
 */
public class Transformador extends Componente{

    public Transformador() {
    }

    public Transformador(String nombre) {
        super(nombre);
    }

    @Override
    public void setNombre(String nombre) {
        super.setNombre(nombre); 
    }

    @Override
    public String getNombre() {
        return super.getNombre(); 
    }
    
}
