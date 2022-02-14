/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */

package Decorator;

/**
 *
 * @author FABIAN <fabian.jovalle at gmail.com>
 */
public class ExtraQueso extends AdicionalesDecorator{
Combo combo;

    public ExtraQueso(Combo combo) {
        this.combo = combo;
    }

    @Override
    public String getDescripcion() {
        return combo.getDescripcion() + " , Extra de Queso";
    }

    @Override
    public int obtenerValor() {
        return 1500 + combo.obtenerValor();
    }
}
