/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */

package Decorator;

/**
 *
 * @author FABIAN <fabian.jovalle at gmail.com>
 */
public class ExtraPapas extends AdicionalesDecorator{
Combo combo;

    public ExtraPapas(Combo combo) {
        this.combo = combo;
    }

    @Override
    public String getDescripcion() {
        return combo.getDescripcion() + " , Porcion extra de Papas";
    }

    @Override
    public int obtenerValor() {
        return 4000 + combo.obtenerValor();
    }
}
