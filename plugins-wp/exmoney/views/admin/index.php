<?php do_action('admin_notices') ?>

<div class="wrap">

    <h1>Exmoney</h1>
    <p style="margin-top:0" style="font-size:1rem">Manejador de intercambio de moneda entre México y USA.</p>

    <form action="" method="post" class="form-table widefat fixed">
        <table>
            <tbody>
                <tr>
                    <td style="padding-left:0">
                        <label for="buy" style="display:block"><b>Compra</b></label>
                        <input id="buy" type="number" min="0" step="0.01" name="buy" value="<?= $content['buy'] ?>" class="regular-text" required>
                    </td>
                </tr>
                <tr>
                    <td style="padding:0 1rem 1rem 0">
                        <label for="sell" style="display:block"><b>Venta</b></label>
                        <input id="sell" type="number" min="0" step="0.01" name="sell" value="<?= $content['sell'] ?>" class="regular-text" required>
                    </td>
                </tr>
            </tbody>
        </table>
        <input type="hidden" name="exm_token" value="<?= $token ?>">

        <p>Última actualización: <?= $content['updated'] ?></p>
        <button type="submit" class="button button-primary button-herox">Actualizar</button>
    </form>

    <p>Por <a href="https://orangesites.mx/" target="_blank">Orangesites</a></p>
</div>