/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */

package Decorator;

/**
 *
 * @author FABIAN <fabian.jovalle at gmail.com>
 */
public class ComboEspecial extends Combo{
    public ComboEspecial() {
        descripcion = "Porcion de Papas Fritas, "
                + "salsas, Hamburguesa especial, gaseosa";
    }

    @Override
    public int obtenerValor() {
        return 12000;
    }
}
