/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */

package Decorator;

/**
 *
 * @author FABIAN <fabian.jovalle at gmail.com>
 */
public class ComboFamiliar extends Combo{
    public ComboFamiliar() {
        descripcion = "4 Porciones de Papas Fritas, "
                + "salsa, 4 hamburguesas sencillas, gaseosa";
    }

    @Override
    public int obtenerValor() {
        return 37000;
    }
}
