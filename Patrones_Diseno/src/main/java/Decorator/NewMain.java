/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package Decorator;

/**
 *
 * @author mrseb
 */
public class NewMain {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        
        ComboBasico combo1 = new ComboBasico();
        ExtraCarne combo1ec = new ExtraCarne(combo1);
        ExtraPapas combo1ecp = new ExtraPapas(combo1ec);
        ExtraQueso combo1ecpq = new ExtraQueso(combo1ecp); 
        System.out.println(" Descripcion: "+combo1ecpq.getDescripcion());
        System.out.println(" Valor total: "+ combo1ecpq.obtenerValor());
    }
    
}
