<?php
/*
	Template Name: Home
*/
get_header();
error_reporting(0);


$addendaFile = file_get_contents( "/home/customer/www/mdataz.com/public_html/yulstaygit/listing-files/ADDENDA.TXT");
$pattern = '/[\n]/';
global $wpdb;
$catch = preg_split($pattern, $addendaFile);

foreach($catch as $value)
{
   $value1= str_replace('�',"",$value);
   $replaceValue= str_replace('"',"",$value1);
   $valueExplode=explode(",",$replaceValue);
    $tablename =  "ADDENDA";
    if(count($wpdb->get_results("SELECT * FROM ADDENDA WHERE NO_INSCRIPTION = '".$valueExplode[0]."' and NO_ADDENDA = '".$valueExplode[1]."' and ORDRE_AFFICHAGE = '".$valueExplode[3]."' ", OBJECT ))===0){
      $wpdb->insert( $tablename, array(
          'NO_INSCRIPTION' =>$valueExplode[0],
          'NO_ADDENDA' =>$valueExplode[1],
          'CODE_LANGUE' =>$valueExplode[2],
          'ORDRE_AFFICHAGE' =>$valueExplode[3],
          'CHAMP_INUTILISE_1' =>$valueExplode[4],
          'CHAMP_INUTILISE_2' =>$valueExplode[5],
          'TEXTE' =>$valueExplode[6]
          )
        );
    }

}

$bureauxFile = file_get_contents("/home/customer/www/mdataz.com/public_html/yulstaygit/listing-files/BUREAUX.TXT");
$bureauxResult = preg_split($pattern, $bureauxFile);
foreach($bureauxResult as $value)
{
    $value1= str_replace('�',"",$value);
    $replaceValue= str_replace('"',"",$value1);
    if(count($wpdb->get_results("SELECT * FROM BUREAUX WHERE CODE = '".$valueExplode[0]."'", OBJECT ))==0){
      $wpdb->insert('BUREAUX', array(
          'CODE' =>$valueExplode[0],
          'FIRME_CODE' =>$valueExplode[1],
          'NOM_LEGAL' =>$valueExplode[2],
          'NO_CIVIQUE' =>$valueExplode[3],
          'NOM_RUE' =>$valueExplode[4],
          'BUREAU' =>$valueExplode[5],
          'MUNICIPALITE' =>$valueExplode[6],
          'PROVINCE' =>$valueExplode[7],
          'CODE_POSTAL' =>$valueExplode[8],
          'TELEPHONE_1' =>$valueExplode[9],
          'TELEPHONE_2' =>$valueExplode[10],
          'POSTE_2' =>$valueExplode[11],
          'TELEPHONE_FAX' =>$valueExplode[12],
          'COURRIEL' =>$valueExplode[14],
          'SITE_WEB' =>$valueExplode[15],
          'DIRECTEUR_CODE' =>$valueExplode[16],
          'URL_LOGO_BUREAU' =>$valueExplode[17]
          )
        );
    }
}
$caracteristiquesFile = file_get_contents("/home/customer/www/mdataz.com/public_html/yulstaygit/listing-files/CARACTERISTIQUES.TXT");
$caracteristiquesResult = preg_split($pattern, $caracteristiquesFile);
foreach($caracteristiquesResult as $value)
{
  $value1= str_replace('�',"",$value);
  $replaceValue= str_replace('"',"",$value1);
    $valueExplode=explode(",",$replaceValue);
    if(count($wpdb->get_results("SELECT * FROM CARACTERISTIQUES WHERE NO_INSCRIPTION = '".$valueExplode[0]."' and TCAR_CODE = '".$valueExplode[1]."' and SCARAC_CODE = '".$valueExplode[2]."'", OBJECT ))==0){
      $wpdb->insert('CARACTERISTIQUES', array(
          'NO_INSCRIPTION' =>$valueExplode[0],
          'TCAR_CODE' =>$valueExplode[1],
          'SCARAC_CODE' =>$valueExplode[2],
          'NOMBRE' =>$valueExplode[3],
          'INFORMATIONS_FRANCAISES' =>$valueExplode[4],
          'INFORMATIONS_ANGLAISES' =>$valueExplode[5],
          'MONTANT' =>$valueExplode[6]
          )
        );
    }
}

// =================================
$depensesFile = file_get_contents("/home/customer/www/mdataz.com/public_html/yulstaygit/listing-files/DEPENSES.TXT");
$depensesResult = preg_split($pattern, $depensesFile);
foreach($depensesResult as $value)
{
    $value1= str_replace('�',"",$value);
    $replaceValue= str_replace('"',"",$value1);
    $valueExplode=explode(",",$replaceValue);
    if(count($wpdb->get_results("SELECT * FROM DEPENSES WHERE NO_INSCRIPTION = '".$valueExplode[0]."' and TDEP_CODE = '".$valueExplode[2]."' and PART_DEPENSE = '".$valueExplode[7]."'", OBJECT ))==0){
      $wpdb->insert('DEPENSES', array(
          'NO_INSCRIPTION' =>$valueExplode[0],
          'TDEP_CODE' =>$valueExplode[1],
          'MONTANT_DEPENSE' =>$valueExplode[2],
          'ANNEE' =>$valueExplode[3],
          'ANNEE_EXPIRATION' =>$valueExplode[4],
          'FREQUENCE' =>$valueExplode[5],
          'PART_DEPENSE' =>$valueExplode[6],
          'AU_DEPENSE_INFO_F' =>$valueExplode[7],
          'AU_DEPENSE_INFO_A' =>$valueExplode[8]
          )
        );
    }
}
// =================================
$firmesFile = file_get_contents("/home/customer/www/mdataz.com/public_html/yulstaygit/listing-files/FIRMES.TXT");
$firmesResult = preg_split($pattern, $firmesFile);
foreach($firmesResult as $value)
{
    $value1= str_replace('�',"",$value);
    $replaceValue= str_replace('"',"",$value1);
    $valueExplode=explode(",",$replaceValue);
    if(count($wpdb->get_results("SELECT * FROM FIRMES WHERE CODE = '".$valueExplode[0]."' ", OBJECT ))==0){
      $wpdb->insert('FIRMES', array(
          'CODE' =>$valueExplode[0],
          'NOM_LEGAL' =>$valueExplode[1],
          'NO_CERTIFICAT' =>$valueExplode[2],
          'TYPE_CERTIFICAT' =>$valueExplode[3],
          'BANNIERE_CODE' =>$valueExplode[4],
          'FIRME_PRINCIPALE' =>$valueExplode[5],
          'COURTIER_CODE' =>$valueExplode[6]
          )
        );
    }
}

// =================================
$inscriptionsFile = file_get_contents("/home/customer/www/mdataz.com/public_html/yulstaygit/listing-files/INSCRIPTIONS.TXT");
$inscriptionsResult = preg_split($pattern, $inscriptionsFile);
foreach($inscriptionsResult as $value)
{
    $value1= str_replace('�',"",$value);
    $replaceValue= str_replace('"',"",$value1);
    $valueExplode=explode(",",$replaceValue);
    if(count($wpdb->get_results("SELECT * FROM INSCRIPTIONS WHERE NO_INSCRIPTION = '".$valueExplode[0]."' ", OBJECT ))==0){
      $wpdb->insert('INSCRIPTIONS', array(
          'NO_INSCRIPTION' =>$valueExplode[0],
          'CHAMP_INUTILISE_1' =>$valueExplode[1],
          'COURTIER_INSCRIPTEUR_1' =>$valueExplode[2],
          'BUREAU_INSCRIPTEUR_1' =>$valueExplode[3],
          'COURTIER_INSCRIPTEUR_2' =>$valueExplode[4],
          'BUREAU_INSCRIPTEUR_2' =>$valueExplode[5],
          'PRIX_DEMANDE' =>$valueExplode[6],
          'UM_PRIX_DEMANDE' =>$valueExplode[7],
          'DEVISE_PRIX_DEMANDE' =>$valueExplode[8],
          'PRIX_LOCATION_DEMANDE' =>$valueExplode[9],
          'UM_PRIX_LOCATION_DEMANDE' =>$valueExplode[10],
          'DEVISE_PRIX_LOCATION_DEMANDE' =>$valueExplode[11],
          'CHAMP_INUTILISE_36' =>$valueExplode[12],
          'CODE_DECLARATION_VENDEUR' =>$valueExplode[13],
          'IND_REPRISE_FINANCE' =>$valueExplode[14],
          'IND_INTERNET' =>$valueExplode[15],
          'IND_ECHANGE_POSSIBLE' =>$valueExplode[16],
          'CHAMP_INUTILISE_37' =>$valueExplode[17],
          'CHAMP_INUTILISE_3' =>$valueExplode[18],
          'CHAMP_INUTILISE_4' =>$valueExplode[19],
          'DATE_MISE_EN_VIGUEUR' =>$valueExplode[20],
          'CHAMP_INUTILISE_38' =>$valueExplode[21],
          'MUN_CODE' =>$valueExplode[22],
          'QUARTR_CODE' =>$valueExplode[23],
          'PRES_DE' =>$valueExplode[24],
          'NO_CIVIQUE_DEBUT' =>$valueExplode[25],
          'NO_CIVIQUE_FIN' =>$valueExplode[26],
          'NOM_RUE_COMPLET' =>$valueExplode[27],
          'APPARTEMENT' =>$valueExplode[28],
          'CODE_POSTAL' =>$valueExplode[29],
          'CHAMP_INUTILISE_39' =>$valueExplode[30],
          'CHAMP_INUTILISE_40' =>$valueExplode[31],
          'CHAMP_INUTILISE_41' =>$valueExplode[32],
          'CHAMP_INUTILISE_5' =>$valueExplode[33],
          'CHAMP_INUTILISE_6' =>$valueExplode[34],
          'CHAMP_INUTILISE_7' =>$valueExplode[35],
          'CHAMP_INUTILISE_8' =>$valueExplode[36],
          'CHAMP_INUTILISE_9' =>$valueExplode[37],
          'CHAMP_INUTILISE_10' =>$valueExplode[38],
          'CHAMP_INUTILISE_11' =>$valueExplode[39],
          'CHAMP_INUTILISE_12' =>$valueExplode[40],
          'CHAMP_INUTILISE_13' =>$valueExplode[41],
          'CHAMP_INUTILISE_14' =>$valueExplode[42],
          'DATE_OCCUPATION' =>$valueExplode[43],
          'DELAI_OCCUPATION_FRANCAIS' =>$valueExplode[44],
          'DELAI_OCCUPATION_ANGLAIS' =>$valueExplode[45],
          'CHAMP_INUTILISE_42' =>$valueExplode[46],
          'CHAMP_INUTILISE_43' =>$valueExplode[47],
          'CHAMP_INUTILISE_44' =>$valueExplode[48],
          'DATE_FIN_BAIL' =>$valueExplode[49],
          'CHAMP_INUTILISE_52' =>$valueExplode[50],
          'CHAMP_INUTILISE_15' =>$valueExplode[51],
          'CHAMP_INUTILISE_45' =>$valueExplode[52],
          'CATEGORIE_PROPRIETE' =>$valueExplode[53],
          'GENRE_PROPRIETE' =>$valueExplode[54],
          'TYPE_BATIMENT' =>$valueExplode[55],
          'TYPE_COPROPRIETE' =>$valueExplode[56],
          'NIVEAU' =>$valueExplode[57],
          'NB_ETAGES' =>$valueExplode[58],
          'ANNEE_CONTRUCTION' =>$valueExplode[59],
          'CODE_ANNEE_CONSTRUCTION' =>$valueExplode[60],
          'CHAMP_INUTILISE_16' =>$valueExplode[61],
          'FACADE_BATIMENT' =>$valueExplode[62],
          'PROFONDEUR_BATIMENT' =>$valueExplode[63],
          'IND_IRREGULIER_BATIMENT' =>$valueExplode[64],
          'UM_DIMENSION_BATIMENT' =>$valueExplode[65],
          'SUPERFICIE_BATIMENT' =>$valueExplode[66],
          'UM_SUPERFICIE_BATIMENT' =>$valueExplode[67],
          'SUPERFICIE_HABITABLE' =>$valueExplode[68],
          'UM_SUPERFICIE_HABITABLE' =>$valueExplode[69],
          'CHAMP_INUTILISE_17' =>$valueExplode[70],
          'FACADE_TERRAIN' =>$valueExplode[71],
          'PROFONDEUR_TERRAIN' =>$valueExplode[72],
          'IND_IRREGULIER_TERRAIN' =>$valueExplode[73],
          'UM_DIMENSION_TERRAIN' =>$valueExplode[74],
          'SUPERFICIE_TERRAIN' =>$valueExplode[75],
          'UM_SUPERFICIE_TERRAIN' =>$valueExplode[76],
          'CHAMP_INUTILISE_46' =>$valueExplode[77],
          'ANNEE_EVALUATION' =>$valueExplode[78],
          'EVALUATION_MUNICIPALE_TERRAIN' =>$valueExplode[79],
          'EVALUATION_MUNICIPALE_BATIMENT' =>$valueExplode[80],
          'NB_PIECES' =>$valueExplode[81],
          'NB_CHAMBRES' =>$valueExplode[82],
          'NB_CHAMBRES_SOUS_SOL' =>$valueExplode[83],
          'NB_CHAMBRES_HORS_SOL' =>$valueExplode[84],
          'NB_SALLES_BAINS' =>$valueExplode[85],
          'NB_SALLES_EAU' =>$valueExplode[86],
          'CHAMP_INUTILISE_47' =>$valueExplode[87],
          'CHAMP_INUTILISE_48' =>$valueExplode[88],
          'CHAMP_INUTILISE_18' =>$valueExplode[89],
          'CHAMP_INUTILISE_19' =>$valueExplode[90],
          'CHAMP_INUTILISE_20' =>$valueExplode[91],
          'CHAMP_INUTILISE_21' =>$valueExplode[92],
          'DEPENSES_TOT_EXPLOITATION' =>$valueExplode[93],
          'CHAMP_INUTILISE_22' =>$valueExplode[94],
          'CHAMP_INUTILISE_23' =>$valueExplode[95],
          'NOM_PLAN_EAU' =>$valueExplode[96],
          'CHAMP_INUTILISE_24' =>$valueExplode[97],
          'CHAMP_INUTILISE_25' =>$valueExplode[98],
          'NB_CHAUFFE_EAU_LOUE' =>$valueExplode[99],
          'INCLUS_FRANCAIS' =>$valueExplode[100],
          'INCLUS_ANGLAIS' =>$valueExplode[101],
          'EXCLUS_FRANCAIS' =>$valueExplode[102],
          'EXCLUS_ANGLAIS' =>$valueExplode[103],
          'NB_UNITES_TOTAL' =>$valueExplode[104],
          'CHAMP_INUTILISE_26' =>$valueExplode[105],
          'CHAMP_INUTILISE_27' =>$valueExplode[106],
          'CHAMP_INUTILISE_28' =>$valueExplode[107],
          'CHAMP_INUTILISE_29' =>$valueExplode[108],
          'CHAMP_INUTILISE_30' =>$valueExplode[109],
          'CHAMP_INUTILISE_31' =>$valueExplode[110],
          "CHAMP_INUTILISE_32"=>$valueExplode[111],
          "CHAMP_INUTILISE_49"=>$valueExplode[112],
          "DATE_MODIF"=>$valueExplode[113],
          "FREQUENCE_PRIX_LOCATION"=>$valueExplode[114],
          "CODE_STATUT"=>$valueExplode[115],
          "POURC_QUOTE_PART"=>$valueExplode[116],
          "UTILISATION_COMMERCIALE"=>$valueExplode[117],
          "CHAMP_INUTILISE_2"=>$valueExplode[118],
          "NOM_DU_PARC"=>$valueExplode[119],
          "CHAMP_INUTILISE_50"=>$valueExplode[120],
          "CHAMP_INUTILISE_51"=>$valueExplode[121],
          "RAISON_SOCIALE"=>$valueExplode[122],
          "EN_OPER_DEPUIS"=>$valueExplode[123],
          "IND_FRANCHISE"=>$valueExplode[124],
          "CHAMP_INUTILISE_33"=>$valueExplode[125],
          "CHAMP_INUTILISE_34"=>$valueExplode[126],
          "CHAMP_INUTILISE_35"=>$valueExplode[127],
          "IND_OPT_RENOUV_BAIL"=>$valueExplode[128],
          "ANNEE_MOIS_ECHEANCE_BAIL"=>$valueExplode[129],
          "URL_VISITE_VIRTUELLE_FRANCAIS"=>$valueExplode[130],
          "URL_VISITE_VIRTUELLE_ANGLAIS"=>$valueExplode[131],
          "URL_DESC_DETAILLEE"=>$valueExplode[132],
          "IND_TAXES_PRIX_DEMANDE"=>$valueExplode[133],
          "IND_TAXES_PRIX_LOCATION_DEMANDE"=>$valueExplode[134],
          "COURTIER_INSCRIPTEUR_3"=>$valueExplode[135],
          "BUREAU_INSCRIPTEUR_3"=>$valueExplode[136],
          "COURTIER_INSCRIPTEUR_4"=>$valueExplode[137],
          "BUREAU_INSCRIPTEUR_4"=>$valueExplode[138],
          "COURTIER1_TYPE_DIVUL_INTERET"=>$valueExplode[139],
          "COURTIER2_TYPE_DIVUL_INTERET"=>$valueExplode[140],
          "COURTIER3_TYPE_DIVUL_INTERET"=>$valueExplode[141],
          "COURTIER4_TYPE_DIVUL_INTERET"=>$valueExplode[142],
          "IND_VENTE_SANS_GARANTIE_LEGALE"=>$valueExplode[143],
          "LATITUDE"=>$valueExplode[144],
          "LONGITUDE"=>$valueExplode[145],
          "TYPE_SUPERFICIE_HABITABLE"=>$valueExplode[146],
          "REV_POT_BRUT_RES"=>$valueExplode[147],
          "REV_POT_BRUT_COMM"=>$valueExplode[148],
          "REV_POT_BRUT_STAT"=>$valueExplode[149],
          "REV_POT_BRUT_AU"=>$valueExplode[150],
          "DATE_REV_BRUT_POT"=>$valueExplode[151],
          "PARTICULARITE_CONSTRUCTION"=>$valueExplode[152],
          "AU_GENRE_PROPRIETE_INFO_F"=>$valueExplode[153],
          "AU_GENRE_PROPRIETE_INFO_A"=>$valueExplode[154],
          "PRIX_DEMANDE_TAXE_INCL"=>$valueExplode[155],
          "IND_VISITES_INTERACTIVES"=>$valueExplode[156]
          )
        );
    }
}


// =================================
$liensAdditionnelsFile = file_get_contents("/home/customer/www/mdataz.com/public_html/yulstaygit/listing-files/LIENS_ADDITIONNELS.TXT");
$liensAdditionnelsResult = preg_split($pattern, $liensAdditionnelsFile);
foreach($liensAdditionnelsResult as $value)
{
    $value1= str_replace('�',"",$value);
    $replaceValue= str_replace('"',"",$value1);
    $valueExplode=explode(",",$replaceValue);
    if(count($wpdb->get_results("SELECT * FROM LIENS_ADDITIONNELS WHERE NO_INSCRIPTION = '".$valueExplode[0]."' and SEQ = '".$valueExplode[1]."'  ", OBJECT ))==0){
      $wpdb->insert('LIENS_ADDITIONNELS', array(
          'NO_INSCRIPTION' =>$valueExplode[0],
          'SEQ' =>$valueExplode[1],
          'TYPE_LIEN' =>$valueExplode[2],
          'LIEN_FRANCAIS' =>$valueExplode[3],
          'LIEN_ANGLAIS' =>$valueExplode[4]
          )
        );
    }
}

// =================================
$membresFile = file_get_contents("/home/customer/www/mdataz.com/public_html/yulstaygit/listing-files/MEMBRES.TXT");
$membresResult = preg_split($pattern, $membresFile);
foreach($membresResult as $value)
{
  $value1= str_replace('�',"",$value);
  $replaceValue= str_replace('"',"",$value1);
  $valueExplode=explode(",",$replaceValue);
  if(count($wpdb->get_results("SELECT * FROM MEMBRES WHERE CODE = '".$valueExplode[0]."' ", OBJECT ))==0){
    $wpdb->insert('MEMBRES', array(
          'CODE' =>$valueExplode[0],
          'BUR_CODE' =>$valueExplode[1],
          'NO_CERTIFICAT' =>$valueExplode[2],
          'TYPE_CERTIFICAT' =>$valueExplode[3],
          'NOM' =>$valueExplode[4],
          'PRENOM' =>$valueExplode[5],
          'TITRE_PROFESSIONNEL' =>$valueExplode[6],
          'CHAMP_INUTILISE_1' =>$valueExplode[7],
          'TELEPHONE_1' =>$valueExplode[8],
          'TELEPHONE_2' =>$valueExplode[9],
          'TELEPHONE_FAX' =>$valueExplode[10],
          'COURRIEL' =>$valueExplode[11],
          'SITE_WEB' =>$valueExplode[12],
          'CHAMP_INUTILISE_2' =>$valueExplode[13],
          'CODE_LANGUE' =>$valueExplode[14],
          'PHOTO_URL' =>$valueExplode[15],
          'DATE_MODIFICATION' =>$valueExplode[16],
          'NOM_SOCIETE' =>$valueExplode[17],
          'TYPE_SOCIETE_DESC_F' =>$valueExplode[18],
          'TYPE_SOCIETE_DESC_A' =>$valueExplode[19],
          'LIEN_VIDEO_F' =>$valueExplode[20],
          'LIEN_VIDEO_A' =>$valueExplode[21],
          'PRESENTATION_F' =>$valueExplode[22],
          'PRESENTATION_A' =>$valueExplode[23]
          )
        );
    }
}


// =================================
$membresMSFile = file_get_contents("/home/customer/www/mdataz.com/public_html/yulstaygit/listing-files/MEMBRES_MEDIAS_SOCIAUX.TXT");
$membresMSResult = preg_split($pattern, $membresMSFile);
foreach($membresMSResult as $value)
{
  $value1= str_replace('�',"",$value);
  $replaceValue= str_replace('"',"",$value1);
  $valueExplode=explode(",",$replaceValue);
  if(count($wpdb->get_results("SELECT * FROM MEMBRES_MEDIAS_SOCIAUX WHERE MEMBRE_CODE = '".$valueExplode[0]."' ", OBJECT ))==0){
    $wpdb->insert('MEMBRES_MEDIAS_SOCIAUX', array(
          'MEMBRE_CODE' =>$valueExplode[0],
          'TYPE_MEDIA_SOCIAL' =>$valueExplode[1],
          'LIEN_MEDIA_SOCIAL' =>$valueExplode[2]
          )
        );
    }
}

// =================================
$photosFile = file_get_contents("/home/customer/www/mdataz.com/public_html/yulstaygit/listing-files/PHOTOS.TXT");
$photosResult = preg_split($pattern, $photosFile);
foreach($photosResult as $value)
{
  $value1= str_replace('�',"",$value);
  $replaceValue= str_replace('"',"",$value1);
  $valueExplode=explode(",",$replaceValue);
  if(count($wpdb->get_results("SELECT * FROM PHOTOS WHERE NO_INSCRIPTION = '".$valueExplode[0]."' and SEQ='".$valueExplode[1]."' ", OBJECT ))==0){
    $wpdb->insert('PHOTOS', array(
            'NO_INSCRIPTION' =>$valueExplode[0],
            'SEQ' =>$valueExplode[1],
            'NOM_FICHIER_PHOTO' =>$valueExplode[2],
            'CODE_DESCRIPTION_PHOTO' =>$valueExplode[3],
            'DESCRIPTION_FRANCAISE' =>$valueExplode[4],
            'DESCRIPTION_ANGLAISE' =>$valueExplode[5],
            'PhotoURL' =>$valueExplode[6],
            'NO_VERSION' =>$valueExplode[7],
            'DATE_MODIFICATION' =>$valueExplode[8]
          )
        );
    }
}

// =================================
$piecesUnitesFile = file_get_contents("/home/customer/www/mdataz.com/public_html/yulstaygit/listing-files/PIECES_UNITES.TXT");
$piecesUnitesResult = preg_split($pattern, $piecesUnitesFile);
foreach($piecesUnitesResult as $value)
{
  $value1= str_replace('�',"",$value);
  $replaceValue= str_replace('"',"",$value1);
  $valueExplode=explode(",",$replaceValue);
  if(count($wpdb->get_results("SELECT * FROM PIECES_UNITES WHERE NO_INSCRIPTION = '".$valueExplode[0]."' and SEQ_UNITE_DET='". $valueExplode[1]."' and SEQ='".$valueExplode[2]."' ", OBJECT ))==0){
    $wpdb->insert('PIECES_UNITES', array(
            'NO_INSCRIPTION' =>$valueExplode[0],
            'SEQ_UNITE_DET' =>$valueExplode[1],
            'SEQ' =>$valueExplode[2],
            'PIECE_CODE' =>$valueExplode[3],
            'AU_PIECE_INFO_F' =>$valueExplode[4],
            'AU_PIECE_INFO_A' =>$valueExplode[5],
            'NIVEAU' =>$valueExplode[6],
            'AU_NIVEAU_INFO_F' =>$valueExplode[7],
            'AU_NIVEAU_INFO_A' =>$valueExplode[8],
            'DIMENSIONS' =>$valueExplode[9],
            'IND_IRREGULIER' =>$valueExplode[10],
            'COUVRE_PLANCHER_CODE' =>$valueExplode[11],
            'AU_COUVRE_PLANCHER_F' =>$valueExplode[12],
            'AU_COUVRE_PLANCHER_A' =>$valueExplode[13],
            'IND_FOYER_POELE' =>$valueExplode[14],
            'INFO_SUPP_F' =>$valueExplode[15],
            'INFO_SUPP_A' =>$valueExplode[16]
          )
        );
    }
}

// =================================
$remarquesFile = file_get_contents("/home/customer/www/mdataz.com/public_html/yulstaygit/listing-files/REMARQUES.TXT");
$remarquesResult = preg_split($pattern, $remarquesFile);
foreach($remarquesResult as $value)
{
  $value1= str_replace('�',"",$value);
  $replaceValue= str_replace('"',"",$value1);
  $valueExplode=explode(",",$replaceValue);
  if(count($wpdb->get_results("SELECT * FROM REMARQUES WHERE NO_INSCRIPTION = '".$valueExplode[0]."' and NO_REMARQUE='".$valueExplode[1]."' and ORDRE_AFFICHAGE='".$valueExplode[2]."' ", OBJECT ))==0){
    $wpdb->insert('REMARQUES', array(
            'NO_INSCRIPTION' =>$valueExplode[0],
            'NO_REMARQUE' =>$valueExplode[1],
            'CODE_LANGUE' =>$valueExplode[2],
            'ORDRE_AFFICHAGE' =>$valueExplode[3],
            'CHAMP_INUTILISE_1' =>$valueExplode[4],
            'CHAMP_INUTILISE_2' =>$valueExplode[5],
            'TEXTE' =>$valueExplode[6]
          )
        );
    }
}

// =================================
$renovationsFile = file_get_contents("/home/customer/www/mdataz.com/public_html/yulstaygit/listing-files/RENOVATIONS.TXT");
$renovationsResult = preg_split($pattern, $renovationsFile);
foreach($renovationsResult as $value)
{
  $value1= str_replace('�',"",$value);
  $replaceValue= str_replace('"',"",$value1);
  $valueExplode=explode(",",$replaceValue);
  if(count($wpdb->get_results("SELECT * FROM RENOVATIONS WHERE NO_INSCRIPTION = '".$valueExplode[0]."' and SEQ='".$valueExplode[1]."' ", OBJECT ))==0){
    $wpdb->insert('RENOVATIONS', array(
            'NO_INSCRIPTION' =>$valueExplode[0],
            'SEQ' =>$valueExplode[1],
            'RENOVATION_TYPE' =>$valueExplode[2],
            'ANNEE' =>$valueExplode[3],
            'CHAMP_INUTILISE_1' =>$valueExplode[4],
            'INFORMATIONS_FRANCAISES' =>$valueExplode[5],
            'INFORMATIONS_ANGLAISES' =>$valueExplode[6],
            'MONTANT' =>$valueExplode[7]
          )
        );
    }
}

// =================================
$unitesDFile = file_get_contents("/home/customer/www/mdataz.com/public_html/yulstaygit/listing-files/UNITES_DETAILLEES.TXT");
$unitesDResult = preg_split($pattern, $unitesDFile);
foreach($unitesDResult as $value)
{
  $value1= str_replace('�',"",$value);
  $replaceValue= str_replace('"',"",$value1);
  $valueExplode=explode(",",$replaceValue);
  if(count($wpdb->get_results("SELECT * FROM UNITES_DETAILLEES WHERE NO_INSCRIPTION = '".$valueExplode[0]."' and SEQ='".$valueExplode[1]."' and TYPE_UNITE_DET='".$valueExplode[2]."' ", OBJECT ))==0){
    $wpdb->insert('UNITES_DETAILLEES', array(
      'NO_INSCRIPTION' =>$valueExplode[0],
            'SEQ' =>$valueExplode[1],
            'TYPE_UNITE_DET' =>$valueExplode[2],
            'NB_PIECES' =>$valueExplode[3],
            'NB_CHAMBRES' =>$valueExplode[4],
            'INCLUS_CHAUFFAGE' =>$valueExplode[5],
            'INCLUS_ELECTRICITE' =>$valueExplode[6],
            'INCLUS_EAU_CHAUDE' =>$valueExplode[7],
            'INCLUS_TAXE_EAU' =>$valueExplode[8],
            'INCLUS_PELOUSE' =>$valueExplode[9],
            'INCLUS_DENEIGEMENT' =>$valueExplode[10],
            'INCLUS_MEUBLE' =>$valueExplode[11],
            'INCLUS_SEMI_MEUBLE' =>$valueExplode[12],
            'NB_STAT_INTERIEURS' =>$valueExplode[13],
            'NB_STAT_EXTERIEURS' =>$valueExplode[14],
            'AU_INCLUS_INFO_F' =>$valueExplode[15],
            'AU_INCLUS_INFO_A' =>$valueExplode[16],
            'IND_VACANT' =>$valueExplode[17],
            'SUPERFICIE_TOTALE' =>$valueExplode[18],
            'UM_SUPERFICIE_TOTALE' =>$valueExplode[19]
          )
        );
    }
}


// =================================
$unitesSile = file_get_contents("/home/customer/www/mdataz.com/public_html/yulstaygit/listing-files/UNITES_SOMMAIRES.TXT");
$unitesSResult = preg_split($pattern, $unitesSile);
foreach($unitesSResult as $value)
{
  $value1= str_replace('�',"",$value);
  $replaceValue= str_replace('"',"",$value1);
  $valueExplode=explode(",",$replaceValue);
  if(count($wpdb->get_results("SELECT * FROM UNITES_SOMMAIRES WHERE NO_INSCRIPTION = '".$valueExplode[0]."' and SEQ='".$valueExplode[1]."' ", OBJECT ))==0){
    $wpdb->insert('UNITES_SOMMAIRES', array(
            'NO_INSCRIPTION' =>$valueExplode[0],
            'SEQ' =>$valueExplode[1],
            'TYPE_UNITE_SOM' =>$valueExplode[2],
            'NB_TOTAL_UNITES' =>$valueExplode[3],
            'NB_UNITES_VACANTES' =>$valueExplode[4],
            'AU_UNITE_REVENU_INFO_F' =>$valueExplode[5],
            'AU_UNITE_REVENU_INFO_A' =>$valueExplode[6]
          )
        );
    }
}


// =================================
$unitesSile = file_get_contents("/home/customer/www/mdataz.com/public_html/yulstaygit/listing-files/VALEURS_FIXES.TXT");
$unitesSResult = preg_split($pattern, $unitesSile);
foreach($unitesSResult as $value)
{
  $value1= str_replace('�',"",$value);
  $replaceValue= str_replace('"',"",$value1);
  $valueExplode=explode(",",$replaceValue);
  if(count($wpdb->get_results("SELECT * FROM VALEURS_FIXES WHERE DOMAINE = '".$valueExplode[0]."' and VALEUR='".$valueExplode[1]."' ", OBJECT ))==0){
    $wpdb->insert('VALEURS_FIXES', array(
            'DOMAINE' =>$valueExplode[0],
            'VALEUR' =>$valueExplode[1],
            'DESCRIPTION_ABREGEE_FRANCAISE' =>$valueExplode[2],
            'DESCRIPTION_ABREGEE_ANGLAISE' =>$valueExplode[3],
            'DESCRIPTION_FRANCAISE' =>$valueExplode[4],
            'DESCRIPTION_ANGLAISE' =>$valueExplode[5]
          )
        );
    }
}
// =================================
$visitesLibresile = file_get_contents("/home/customer/www/mdataz.com/public_html/yulstaygit/listing-files/VISITES_LIBRES.TXT");
$visitesLibresileResult = preg_split($pattern, $visitesLibresile);
foreach($visitesLibresileResult as $value)
{
  $value1= str_replace('�',"",$value);
  $replaceValue= str_replace('"',"",$value1);
  $valueExplode=explode(",",$replaceValue);
  if(count($wpdb->get_results("SELECT * FROM VISITES_LIBRES WHERE NO_INSCRIPTION = '".$valueExplode[0]."' and SEQ='".$valueExplode[1]."' ", OBJECT ))==0){
    $wpdb->insert('VISITES_LIBRES', array(
            'NO_INSCRIPTION' =>$valueExplode[0],
            'SEQ' =>$valueExplode[1],
            'DATE_DEBUT' =>$valueExplode[2],
            'DATE_FIN' =>$valueExplode[3],
            'HEURE_DEBUT' =>$valueExplode[4],
            'HEURE_FIN' =>$valueExplode[5],
            'COMMENTAIRES_F' =>$valueExplode[6] ,
            'COMMENTAIRES_A' =>$valueExplode[7] ,
            'CODE_VISITE_CARAVANE' =>$valueExplode[8] ,
            'LIEN_VISITE_VIRT' =>$valueExplode[9]
          )
        );
    }
}


$getResultInscription=$wpdb->get_results("SELECT * FROM INSCRIPTIONS", OBJECT );
foreach($getResultInscription as $value)
{
  if(count($wpdb->get_results("SELECT * FROM ".$wpdb->prefix."posts where post_content='$value->NO_INSCRIPTION'", OBJECT ))==0){
    // // Create post object
    $postType="";
    if($value->CATEGORIE_PROPRIETE=="T"){
      $postType="rental-property";
    }
    if($value->CATEGORIE_PROPRIETE=="R"){
      $postType='residential';
    }
    if($value->CATEGORIE_PROPRIETE=="M"){
      $postType='multi-residential';
    }
    $my_post = array(
      'post_title'    => wp_strip_all_tags( $value->NOM_RUE_COMPLET ),
      'post_content'  => $value->NO_INSCRIPTION,
      'post_status'   => 'publish',
      'post_type'   => $postType,
      'post_author'   => 1,
      'post_category' => array(1 )
    );

    // // Insert the post into the database
    $insertId= wp_insert_post( $my_post );
    $wpdb->insert('wp_icl_translate', array(
      'job_id'    => 1,
      'content_id'  =>0,
      'field_type'   => "original_id",
      'field_wrap_tag'   =>"",
      'field_format'   => "",
      'field_translate' =>0,
      'field_data'   => $insertId,
      'field_data_translated'   =>$insertId,
      'field_finished'   => 1,
    )
  );
  }
}
?>

<div class="h-screen w-screen mr-12 flex flex-col justify-between px-6 py-14 md:p-14 text-white" onclick="openModal()">
    <video autoplay muted loop id="myVideo" class="w-full h-full object-cover">
        <source src="<?php echo get_template_directory_uri(); ?>/assets/img/Yulstay.mp4" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>
    <div>
        <div class="hidden md:block">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" class="w-80" alt="">
        </div>
        <h2 class="text-5xl font-poppins pt-4 font-bold">
            Investing in peace of mind
        </h2>
    </div>


    <div class="flex justify-between">
        <div>
            <a href="<?php bloginfo('url'); ?>/join-our-team"
                class="px-4 py-2 mb-4 rounded-full bg-none hover:bg-[#00AEC5] hover:text-white font-poppins font-semibold"><?php _e('Join Our Team','theme-text-domain'); ?></a>
        </div>
        <div class="md:pr-6">
            <a href="<?php bloginfo('url'); ?>/join-our-team"
                class="px-4 py-2 mb-4 rounded-full bg-none hover:bg-[#00AEC5] hover:text-white font-poppins font-semibold"><?php _e('Book a Consutation','theme-text-domain'); ?></a>
        </div>
    </div>
</div>

<?php get_footer(); ?>