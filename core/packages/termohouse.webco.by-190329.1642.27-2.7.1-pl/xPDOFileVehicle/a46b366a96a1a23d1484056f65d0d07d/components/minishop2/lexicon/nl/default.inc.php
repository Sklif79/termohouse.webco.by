<?php
/**
 * Default English Lexicon Entries for miniShop2
 *
 * @package minishop2
 * @subpackage lexicon
 */
include_once('setting.inc.php');
$files = scandir(dirname(__FILE__));
foreach ($files as $file) {
    if (strpos($file, 'msp.') === 0) {
        @include_once($file);
    }
}
$_lang['minishop2'] = 'miniShop2';
$_lang['ms2_menu_desc'] = 'E-commerce plugin';
$_lang['ms2_order'] = 'Order';
$_lang['ms2_orders'] = 'Orders';
$_lang['ms2_orders_intro'] = 'Beheer orders';
$_lang['ms2_orders_desc'] = 'Beheer orders';
$_lang['ms2_settings'] = 'Instellingen';
$_lang['ms2_settings_intro'] = 'Algemene instellingen van de shop. Stel hier de betaalmethoden, verzendmethodes, bezorging en status van orders in';
$_lang['ms2_settings_desc'] = 'Status van orders, opties, betalingen en levering';
$_lang['ms2_payment'] = 'Betaling';
$_lang['ms2_payments'] = 'Betaling';
$_lang['ms2_payments_intro'] = 'Je kunt ieder type betaling instellen. De betalingslogica (sturen van de bezoeker naar de betaalomgeving, ontvangen van betaling etc.) wordt geïmplementeerd in de class welke je zelf kan instellen.<br/> Voor betaalmethoden is de parameter "class" verplicht.';
$_lang['ms2_delivery'] = 'Verzendmethode';
$_lang['ms2_deliveries'] = 'Verzendmethoden';
$_lang['ms2_deliveries_intro'] = 'Mogelijke verzendmethoden. De berekening van de verzendkosten afhankelijk van de afstand en gewicht zijn geimplementeerd in een class, welke je specificeerd in de instellingen.<br/>Als je geen class specificeerd, dan zullen de berekeningen worden gemaakt op basis van een standaard algoritme.';
$_lang['ms2_statuses'] = 'Statussen';
$_lang['ms2_statuses_intro'] = 'Sommige order statussen zijn verplicht: "nieuw", "betaald", "verstuurd" en "geannuleerd". Deze kunnen worden ingesteld maar niet worden verwijderd aangezien ze nodig zijn voor de werking van de shop.
Je kunt aangeven bij een status of hierbij extra logica moet plaatsvinden.<br/>Een status kan definitief zijn, dit houdt in dat de status dan niet meer veranderd kan worden, bijvoorbeeld: "verzonden" en "geannuleerd". De staat van een bestelling kan ook gefixeerd zijn, in dat geval kun je niet terug naar een eerdere bestelstatus. Zo kun je een bestelling met de status "betaald" niet wijzigen naar de status "nieuw".';
$_lang['ms2_vendors'] = 'Product fabrikanten';
$_lang['ms2_vendors_intro'] = 'Een lijst van mogelijke product fabrikanten. Toegevoegde fabrikanten worden selecteerbaar in het veld "Fabrikant" van producten.';
$_lang['ms2_link'] = 'Verband tussen goederen';
$_lang['ms2_links'] = 'Verbanden tussen goederen';
$_lang['ms2_links_intro'] = 'Lijst van mogelijke onderlingen verbanden tussen producten. Het geselecteerde verband beschrijft precies hoe het zal werken. Het is niet mogelijk om verbanden toe te voegen, je kunt alleen een verband selecteren uit de lijst.';
$_lang['ms2_option'] = 'Product optie';
$_lang['ms2_options'] = 'Product opties';
$_lang['ms2_options_intro'] = 'Lijst van mogelijke product opties. De category lijst wordt gebruikt om opties te filteren op basis van categorieën.<br/>Gebruik Ctrl(Cmd) of Shift om meerdere opties aan categorieën te koppelen.';
$_lang['ms2_options_category_intro'] = 'Lijst van beschikbare product opties in de categorie.';
$_lang['ms2_default_value'] = 'Standaard waarde';
$_lang['ms2_customer'] = 'Klant';
$_lang['ms2_all'] = 'Alle';
$_lang['ms2_type'] = 'Type';
$_lang['ms2_btn_create'] = 'Nieuw';
$_lang['ms2_btn_copy'] = 'Kopieer';
$_lang['ms2_btn_save'] = 'Opslaan';
$_lang['ms2_btn_edit'] = 'Wijzigen';
$_lang['ms2_btn_view'] = 'Bekijken';
$_lang['ms2_btn_delete'] = 'Verwijderen';
$_lang['ms2_btn_undelete'] = 'Verwijderen ongedaan maken';
$_lang['ms2_btn_publish'] = 'Publiceer';
$_lang['ms2_btn_unpublish'] = 'Depubliceer';
$_lang['ms2_btn_cancel'] = 'Annuleer';
$_lang['ms2_btn_back'] = 'Terug (alt + &uarr;)';
$_lang['ms2_btn_prev'] = 'Vorige knop (alt + &larr;)';
$_lang['ms2_btn_next'] = 'Volgende knop (alt + &rarr;)';
$_lang['ms2_btn_help'] = 'Hulp';
$_lang['ms2_btn_duplicate'] = 'Dupliceer product';
$_lang['ms2_btn_addoption'] = 'Voeg optie toe';
$_lang['ms2_btn_assign'] = 'Toewijzen';
$_lang['ms2_actions'] = 'Acties';
$_lang['ms2_search'] = 'Zoeken';
$_lang['ms2_search_clear'] = 'Leegmaken';
$_lang['ms2_category'] = 'Productcategorie';
$_lang['ms2_category_tree'] = 'Categorie lijst';
$_lang['ms2_category_type'] = 'Productcategorie';
$_lang['ms2_category_create'] = 'Voeg categorie toe';
$_lang['ms2_category_create_here'] = 'Productcategorie';
$_lang['ms2_category_manage'] = 'Beheer categorie';
$_lang['ms2_category_duplicate'] = 'Kopieer categorie';
$_lang['ms2_category_publish'] = 'Publiceer categorie';
$_lang['ms2_category_unpublish'] = 'Depubliceer categorie';
$_lang['ms2_category_delete'] = 'Verwijder categorie';
$_lang['ms2_category_undelete'] = 'Verwijderen categorie ongedaan maken';
$_lang['ms2_category_view'] = 'Bekijk op de website';
$_lang['ms2_category_new'] = 'Nieuwe categorie';
$_lang['ms2_category_option_add'] = 'Voeg optie toe';
$_lang['ms2_category_option_rank'] = 'Rang';
$_lang['ms2_category_show_nested'] = 'Toon onderliggende producten';
$_lang['ms2_product'] = 'Product';
$_lang['ms2_product_type'] = 'Product';
$_lang['ms2_product_create_here'] = 'Product';
$_lang['ms2_product_create'] = 'Voeg product toe';
$_lang['ms2_option_type'] = 'Optie type';
$_lang['ms2_frontend_currency'] = 'EURO';
$_lang['ms2_frontend_weight_unit'] = 'kg.';
$_lang['ms2_frontend_count_unit'] = 'stuks.';
$_lang['ms2_frontend_add_to_cart'] = 'Voeg toe aan winkelwagen';
$_lang['ms2_frontend_tags'] = 'Tags';
$_lang['ms2_frontend_colors'] = 'Kleuren';
$_lang['ms2_frontend_color'] = 'Kleur';
$_lang['ms2_frontend_sizes'] = 'Afmetingen';
$_lang['ms2_frontend_size'] = 'Afmetingen';
$_lang['ms2_frontend_popular'] = 'Populair';
$_lang['ms2_frontend_favorite'] = 'Favoriet';
$_lang['ms2_frontend_new'] = 'Nieuw';
$_lang['ms2_frontend_deliveries'] = 'Bezorgmethoden';
$_lang['ms2_frontend_delivery'] = 'Bezorgmethode';
$_lang['ms2_frontend_payments'] = 'Betalingen';
$_lang['ms2_frontend_payment'] = 'Betaling';
$_lang['ms2_frontend_delivery_select'] = 'Selecteer bezorgmethode';
$_lang['ms2_frontend_payment_select'] = 'Selecteer betaalmethode';
$_lang['ms2_frontend_credentials'] = 'Gegevens';
$_lang['ms2_frontend_address'] = 'Adres';
$_lang['ms2_frontend_comment'] = 'Opmerking';
$_lang['ms2_frontend_receiver'] = 'Ontvangen';
$_lang['ms2_frontend_email'] = 'E-mailadres';
$_lang['ms2_frontend_phone'] = 'Telefoonnummer';
$_lang['ms2_frontend_index'] = 'Postcode';
$_lang['ms2_frontend_region'] = 'Provincie';
$_lang['ms2_frontend_city'] = 'Stad';
$_lang['ms2_frontend_street'] = 'Straat';
$_lang['ms2_frontend_building'] = 'Gebouw';
$_lang['ms2_frontend_room'] = 'Kamer';
$_lang['ms2_frontend_order_cost'] = 'Totale kosten';
$_lang['ms2_frontend_order_submit'] = 'Afrekenen';
$_lang['ms2_frontend_order_cancel'] = 'Reset formulier';
$_lang['ms2_frontend_order_success'] = 'Bedankt voor uw bestelling <b>#[[+num]]</b> op onze website <b>[[++site_name]]</b>!';
$_lang['ms2_message_close_all'] = 'Sluit alle';
$_lang['ms2_err_unknown'] = 'Onbekende fout';
$_lang['ms2_err_ns'] = 'Dit veld is verplicht';
$_lang['ms2_err_ae'] = 'Dit veld moet uniek zijn';
$_lang['ms2_err_json'] = 'Dit veld moet een JSON string bevatten';
$_lang['ms2_err_order_nf'] = 'Kon geen bestelling vinden met deze zoekopdracht.';
$_lang['ms2_err_status_nf'] = 'Kon geen status vinden met deze zoekopdracht.';
$_lang['ms2_err_delivery_nf'] = 'Kon geen verzendmethode vinden met deze zoekopdracht.';
$_lang['ms2_err_payment_nf'] = 'Kon geen betaalmethode vinden met deze zoekopdracht.';
$_lang['ms2_err_status_final'] = 'De definitieve status is ingesteld, je kunt deze niet wijzigen.';
$_lang['ms2_err_status_fixed'] = 'Deze status is gefixeerd. Je kunt deze niet wijzigen naar een vorige status.';
$_lang['ms2_err_status_wrong'] = 'Verkeerde status van de bestelling.';
$_lang['ms2_err_status_same'] = 'Deze status is reeds ingesteld.';
$_lang['ms2_err_register_globals'] = 'Fout: php parameter <b>register_globals</b> moet uitgezet staan.';
$_lang['ms2_err_link_equal'] = 'Je probeert een link toe te voegen naar het huidige product.';
$_lang['ms2_err_value_duplicate'] = 'Je hebt geen waarde ingevuld of heeft een reeds bestaande waarde ingevuld.';
$_lang['ms2_err_gallery_save'] = 'Kon het bestand niet opslaan';
$_lang['ms2_err_gallery_ns'] = 'Kon het bestand niet lezen';
$_lang['ms2_err_gallery_ext'] = 'Verkeerde bestandsextensie';
$_lang['ms2_err_gallery_thumb'] = 'Kon geen thumbnails genereren. Bekijk de systeemlogs voor meer informatie.';
$_lang['ms2_err_gallery_exists'] = 'Deze afbeelding bestaat al in de product gallerij.';
$_lang['ms2_err_wrong_image'] = 'Bestand is geen geldig afbeeldingsformaat.';
$_lang['ms2_email_subject_new_user'] = 'Je hebt de bestelling #[[+num]] gedaan op de website [[++site_name]]';
$_lang['ms2_email_subject_new_manager'] = 'Je hebt een nieuwe bestelling #[[+num]]';
$_lang['ms2_email_subject_paid_user'] = 'Je hebt de bestelling #[[+num]] betaald';
$_lang['ms2_email_subject_paid_manager'] = 'Bestelling #[[+num]] is betaald';
$_lang['ms2_email_subject_sent_user'] = 'Je bestelling met bestelnummer #[[+num]] is verzonden.';
$_lang['ms2_email_subject_cancelled_user'] = 'Je bestelling met bestelnummer #[[+num]] is geannuleerd.';
$_lang['ms2_payment_link'] = 'Indien je de betaling perongeluk annuleerd, kun je deze altijd <a href="[[+link]]" style="color:#348eda;">afronden door middel van deze link</a>.';
$_lang['ms2_category_err_ns'] = 'Categorie is niet gespecificeerd';
$_lang['ms2_option_err_ns'] = 'Optie is niet gespecificeerd';
$_lang['ms2_option_err_nf'] = 'Optie is niet gevonden';
$_lang['ms2_option_err_ae'] = 'Optie bestaat al';
$_lang['ms2_option_err_save'] = 'Er heeft zich een fout voorgedaan tijdens het opslaan van de optie';
$_lang['ms2_option_err_reserved_key'] = 'Optie sleutel is al in gebruik';
$_lang['ms2_option_err_invalid_key'] = 'Optie sleutel is niet valide';