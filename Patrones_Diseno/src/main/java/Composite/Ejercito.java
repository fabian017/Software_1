/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */

package Composite;

import java.awt.List;
import java.util.ArrayList;

/**
 *
 * @author FABIAN <fabian.jovalle at gmail.com>
 */
public class Ejercito implements Elemento{
    private int id;
    private String nombre;
    private ArrayList<Elemento> elementos; 

    public Ejercito(int id, String nombre) {
        this.id = id;
        this.nombre = nombre;
        this.elementos = new ArrayList<>();
    }
    
    public void nombreElemento(){
        elementos.forEach(Elemento:: nombreElemento);
    }
    
    public void agregarElemento(Elemento elemento){
        elementos.add(elemento);
    }
    
    public void eliminarElemento(Elemento elemento){
        elementos.remove(elemento);
    }
    
    public ArrayList<Elemento> getElementos(){
        return elementos;
    }
    
}
