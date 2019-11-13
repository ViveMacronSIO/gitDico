<section style="margin:50px 0 50px">
		<div class="container">
			<div class="col-md-10 col-md-offset-1">
				<table class="table table-bordered table-striped text-center">
					<tr>
						<th class="text-center" width="20%">MOT</th>
						<th class="text-center" width="20%">NOMBRES POINTS</th>
						<th class="text-center" width="20%">DUREE</th>
						<th class="text-center" width="40%">ACTIONS</th>
					</tr>
                                            <?php
                                                foreach($lesMots as $unMot)
                                                {
                                                ?>
                                                <tr>
                                                    <?php 
                                                    if(isset($_GET["modif"]) && $unMot['idMot'] == $_GET["modif"])
                                                    {
                                                        ?>
                                                        <form method="POST" action="index.php?uc=gestionMots">
                                                            <input type="text" id='masque' name="idMot" class="form-control" value="<?php echo $unMot['idMot']; ?>">
                                                            <td><input type="text" name="contenuMot" class="form-control" value="<?php echo $unMot['contenuMot']; ?>"></td>
                                                            <td><input type="text" name="nbPointsMot" class="form-control" value="<?php echo $unMot['nbPointsMot']; ?>"></td>
                                                            <td><input type="text" name="dureeMot" class="form-control" value="<?php echo $unMot['dureeMot']; ?>"> </td>
                                                            <td>
                                                                <div class="row">
                                                                    <div class="col-md-6 col-md-offset-3">
                                                                            <button type="submit" name="modif" class="btn btn-primary btn-block">VALIDER</button>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </form>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                        <td><?php echo $unMot['contenuMot']; ?></td>
                                                        <td><?php echo $unMot['nbPointsMot']; ?></td>
                                                        <td><?php echo $unMot['dureeMot']; ?></td>
                                                        <td>
                                                            <div class="row">
                                                                    <div class="col-md-6">
                                                                            <a href='index.php?uc=gestionMots&modif=<?php echo $unMot['idMot']; ?>' class="btn btn-default btn-block col-md-6">MODIFIER</a>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                            <a href='index.php?uc=gestionMots&sup=<?php echo $unMot['idMot']; ?>' class="btn btn-danger btn-block col-md-6" onclick="return confirm('Voulez vraiment supprimer');">SUPPRIMER</a>
                                                                    </div>
                                                            </div>
                                                        </td>
                                                        <?php 
                                                    }
                                                    ?>
                                                </tr>
                                            <?php
                                        }
                                        ?>
					<tr>
						<form method="POST" action="index.php?uc=gestionMots">
                           
							<td><input type="text" class="form-control" id="inputMot" name="mot" placeholder="Mot"></td>
							<td><input type="text" class="form-control" id="inputPoint" name="point" placeholder="Point"></td>
							<td><input type="text" class="form-control" id="inputDuree" name="duree" placeholder="Duree"></td>
							<td>
								<div class="row">
                                                                    <div class="col-md-6 col-md-offset-3">
                                                                        <button type="submit" class="btn btn-default btn-block" name="ajouter">AJOUTER</button>
                                                                    </div>
								</div>
							</td>
						</form>
					</tr>
				</table>
			</div>
            <div class="col-md-3 col-md-offset-1">
                <a href='index.php' class="btn btn-default btn-block">LISTE DES THEMES</a>
            </div>
		</div>
	</section>