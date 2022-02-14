/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Decorator;

/**
 *
 * @author FABIAN <fabian.jovalle at gmail.com>
 */
public class ComboBasico extends Combo {

    public ComboBasico() {
        descripcion = "Porcion de Papas Fritas, "
                + "salsa, hamburguesa sencilla, gaseosa";
    }

    @Override
    public int obtenerValor() {
        return 10000;
    }
}
