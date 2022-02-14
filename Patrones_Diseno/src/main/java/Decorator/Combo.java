/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */

package Decorator;

/**
 *
 * @author FABIAN <fabian.jovalle at gmail.com>
 */
public abstract class Combo {
    String descripcion = "";
 
    public String getDescripcion() 
    {
     return descripcion;
    }

    public abstract int obtenerValor();

}
