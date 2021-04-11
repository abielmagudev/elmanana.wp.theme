<?php $covers_id = is_object($stored) ? $stored->covers_id : [] ?>

<div class="wrap">

    <?php if( isset($message['text']) && isset($message['color']) ): ?>
    <p style="background-color: #FEFFFE; padding:0.5rem; border-radius: 0.25rem; border-left: 0.25rem solid <?= $message['color'] ?>">
        <?= $message['text'] ?>
    </p>
    <?php endif ?>
    <h1>Portadas</h1>
    <p style="margin:0">Administrador de portadas con selección de publicaciones.</p>
    <p><b>Instrucciones:</b></p>
    <ol>
        <li>Copiar la direccion web(URL) de la publicación.</li>
        <li>Pegar en el campo correspondiente según su posición.</li>
        <li>Hacer clic en el botón de "Actualizar".</li>
    </ol>
    <form action="<?= admin_url('admin-post.php') ?>" method="post">
        <table class="form-table">
            <tbody>

                <?php foreach(['Primera posición (principal)','Segunda posición','Tercera posición'] as $key => $label): ?>
                <tr>
                    <th>
                        <label for="url_<?= $key ?>"><?= $label ?></label>
                    </th>
                    <td>
                        <input name="urls[]" id="url_<?= $key ?>" class="regular-text" type="url">
                        <p style="font-size:0.75rem">
                            <span style="color:#777">Ahora: </span>

                            <?php if( isset( $covers_id[$key] ) ): $permalink = get_permalink( $covers_id[$key] ) ?>
                            <a href="<?= $permalink ?>" target="_blank"><?= $permalink ?></a>
                            <?php else: ?>
                            <span class="text-muted">Sin dirección web</span>
                            <?php endif ?>
                        </p>
                    </td>
                </tr>
                <?php endforeach ?>

            </tbody>
        </table>

        <input type="hidden" name="token" value="<?= cvr_get_token() ?>">
        <input type="hidden" name="action" value="covering">

        <?php if( isset($stored->updated) ): ?>
        <p>
            <small>Última actualización <b><?= $stored->updated ?></b></small>
        </p>
        <?php endif ?>
        <button class="button button-primary" type="submit">Actualizar</button>
        
    </form>

    <p>Por <a href="https://orangesites.mx/" target="_blank">Orangesites</a></p>
</div>
