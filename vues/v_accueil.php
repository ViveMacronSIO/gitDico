	<section style="margin:50px 0 50px">
		<div class="container">
			<div class="col-md-10 col-md-offset-1">
				<table class="table table-bordered table-striped text-center">
					<tr>
                                            <th class="text-center" width="20%">THEMES</th>
                                            <th class="text-center" width="10%">DUREE</th>
                                            <th class="text-center" width="10%">NOMBRES MOTS</th>
                                            <th class="text-center" width="20%">GERER MOTS</th>
                                            <th class="text-center" width="40%">ACTIONS</th>
					</tr>
                                        <?php
                                        foreach($lesThemes as $unThemes)
                                        {
                                            ?>
                                                <tr>
                                                    <?php 
                                                    if(isset($_GET["modif"]) && $unThemes['idTheme'] == $_GET["modif"])
                                                    {
                                                        ?>
                                                        <form method="POST" action="index.php">
                                                            <input id="masque" name="id" type="text" class="form-control" value="<?php echo $unThemes['idTheme']; ?>">
                                                            <td><input name="nom" type="text" class="form-control" value="<?php echo $unThemes['nomTheme']; ?>"></td>
                                                            <td><input name="duree" type="text" class="form-control" value="<?php echo $unThemes['dureeTheme']; ?>"></td>
                                                            <td><?php echo $unThemes['nbMots']; ?></td>
                                                            <td ><a href='gestionMots.html' class="btn btn-default btn-block" disabled>GERER MOTS</a></</td>
                                                            <td>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <button type="submit" name="modif" class="btn btn-primary btn-block">VALIDER</button>
                                                                    </div>
                                                                    <div class = "col-md-6">
                                                                        <button type="submit" name="annuler" class="btn btn-danger btn-block">ANNULER</button>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </form>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                        <td><?php echo $unThemes['nomTheme']; ?></td>
                                                        <td><?php echo $unThemes['dureeTheme']; ?></td>
                                                        <td><?php echo $unThemes['nbMots']; ?></td>
                                                        <td ><a href='index.php?uc=gestionMots&idTheme=<?php echo $unThemes['idTheme']; ?>' class="btn btn-default btn-block">GERER MOTS</a></</td>
                                                        <td>
                                                            <div class="row">
                                                                    <div class="col-md-6">
                                                                            <a href='index.php?modif=<?php echo $unThemes['idTheme']; ?>' class="btn btn-default btn-block col-md-6">MODIFIER</a>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                            <a href='index.php?sup=<?php echo $unThemes['idTheme']; ?>' class="btn btn-danger btn-block col-md-6" onclick="return confirm('Voulez vraiment supprimer');">SUPPRIMER</a>
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
                                            <form method="POST" action="index.php">
                                                <td><input type="text" class="form-control" placeholder="Nom" name="nom"></td>
                                                <td><input type="text" class="form-control" placeholder="Duree" name="duree"></td>
                                                <td></td>
                                                <td ><a href='#' class="btn btn-default btn-block" disabled>GERER MOTS</a></</td>
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
		</div>
	</section>
