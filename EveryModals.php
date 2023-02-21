<!--++++++++++++++++++++++++++++++++++ MENUS et FORMULES ++++++++++++++++++++++++++-->
    <div class="modal fade min-vw-auto" id="Menus" tabindex="-1" role="dialog" aria-labelledby="Menus" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
		<div class="modal-body">
	            <?php
                        require('PROCESS/ModalMenus.php');
	            ?>
	        </div>
		<div class='modal-footer'>
		    <?php require('PROCESS/InfoOpenResto.php'); ?>
		</div>
	    </div>
	</div>
    </div>
<!--++++++++++++++++++++++++++++++++++ HORAIRES++++++++++++++++++++++++++++++++++-->    
    <div class="modal fade" id="Horaires" tabindex="-1" role="dialog" aria-labelledby="Horaires" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <p class='FontQuaiHeader'>Nos Horaires d'ouverture</p>
                    <div class="modal-footer">
                        <button class="btn btn-close col-xs-2" data-bs-dismiss="modal"></button>
                    </div>
                </div>
                <div class="modal-body">
                    <table class='table'>
                        <tbody>   
                            <?php
                                require('ModalHoraires.php');
                            ?>
                        </tbody>
                    </table>
                </div>
		<div class='modal-footer'>
			<?php require('PROCESS/InfoOpenResto.php'); ?>
		</div>
            </div>
        </div>
    </div>
<!--++++++++++++++++++++++++++++++++++ RESERVATIONS ++++++++++++++++++++++++++-->    
    <div class="modal fade" id="NewResa" tabindex="-1" role="dialog" aria-labelledby="Resa" aria-hidden="true">
        <?php
            require('ModalNewResa.php');
        ?>
    </div>
<!--++++++++++++++++++++++++++++++++++ CONNEXION ++++++++++++++++++++++++++-->    
    <div class="modal fade" id="Connect" tabindex="-1" role="dialog" aria-labelledby="Connect" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <p class='FontQuaiHeader'>CONNEXION</p>
                    <button class="btn btn-close" id="closeConnect" data-bs-dismiss="modal" mb-2></button>
                </div>
                <div class="modal-body">
                <?php
	            require('ModalConnect.php');
                ?>
                </div>
		<div class='modal-footer'>
		    <?php require('PROCESS/InfoOpenResto.php'); ?>
		</div>
            </div>
        </div>
    </div>   
<!--+++++++++++++++++++++++++++++++++ CARTE ++++++++++++++++++++++++++++++++++++++++++++++-->
    <div class="modal fade" id="LaCARTE" tabindex="-1" role="dialog" aria-labelledby="LaCARTE" aria-hidden="true">
	<?php
            require('PROCESS/ModalCardWelcom.php');
        ?>
    </div>
<!--++++++++++++++++++++++++++++++++++ CREER UN COMPTE ++++++++++++++++++++++++++-->    
    <div class="modal fade" id="ModalCrtClient" tabindex="-1" role="dialog" aria-labelledby="Resa" aria-hidden="true">
        <?php
            require('ModalCrtCmptClient.php');
        ?>
    </div>
