/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// start the Stimulus application
import './bootstrap';
import { Tooltip, Toast, Popover } from 'bootstrap';

import './epargne/groupe/depot';
import './credit/decaissement'
import './credit/amortissement';
import './credit/approbation'
import './api/retrait'
import './api/individuel'
import './api/groupe'
import './api/credit'
import './api/remboursement'
import './api/agence'
import './api/jquery-3.6.0'
import './api/jquery-ui'
import './api/all_rapport'
import './api/compte_epargne/compt_epargne_groupe'
import './api/compte_epargne/ouvrir_compte_epargne_client'
import './api/compte_epargne/compte_epargne_individuel'
import './api/compte_epargne/api_rapport_releve'
import './api/compte_epargne/api_transfert';
import './api/dashboard';

//Import les api retrait ////
import './api/compte_epargne/depot'

//import les api pour les compte epargne
//import './api/api_compte_epargne'//



import $ from 'jquery';
import 'jquery-modal/jquery.modal'
// import 'jquery-modal';


import jsZip from 'jszip'; 
import 'pdfmake';
import 'datatables.net-buttons-dt';
import 'datatables.net-dt';
import 'datatables.net-buttons/js/buttons.html5';
import 'datatables.net-buttons/js/buttons.print';
import 'datatables.net-bs5';
import '@fortawesome/fontawesome-free/js/all';


window.JSZip = jsZip;

//*******************Variable sur le chemiin *****************/
const path = window.location.pathname;

$(document).ready(function(){

    /*******Lancer modal  */
        

    $(".table1").DataTable({
        dom: 'Bfrtp',
        buttons: [
            'excel','pdf','print'
        ],
        language: {
            search: "Rechercher&nbsp;",
            lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
            info: "Affichage de  _START_ a _END_ sur _TOTAL_ elements",
            paginate: {
                first:      "Premier",
                previous:   "Pr&eacute;c&eacute;dent",
                next:       "Suivant",
                last:       "Dernier"
            }
        }
      
    });

    $(".table2").DataTable({
        dom: 'ftp',
        language: {
            search: "Rechercher&nbsp;",
            lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
            info: "Affichage de  _START_ a _END_ sur _TOTAL_ elements",
            paginate: {
                first:      "Premier",
                previous:   "Pr&eacute;c&eacute;dent",
                next:       "Suivant",
                last:       "Dernier"
            }
        }
      
    });


    $('#filtre_rapport_transaction_date1').on('keyup',()=>{
        $('#two_date').hide()
    })

    $('#filtre_rapport_transaction_Au').on('keyup',()=>{
        $('#one_date').hide()
    }) 
    $('#filtre_rapport_transaction_Du').on('keyup',()=>{
        $('#one_date').hide()
    })

    $('#individuelclient_date_naissance').on('change',(e)=>{
        var birth_ = e.target.value
        var year_birth =parseInt(birth_.slice(0,4))
        var year_now = parseInt(new Date().getFullYear())

        var age = year_now - year_birth
        $('#age').html(age+' ans  ')
       
    })

        /**********Utilisateur sur indivuduelle client******************** */
        var user_log_ = parseInt($('#user').text())
    
        $('#individuelclient_user option').each(() => {
            // alert($(this).val())
            if (user_log_ === parseInt($(this).val())) {
                $(this).attr('selected','selected')
                $(this).val(user_log_)
            }
            
        });

        // {# Cacher le champ code client#}
        $('#code').attr("style", "display: none");

        $("#filtre_rapport_solde_date1").on('change',function(){
            $('#two_date').hide();
        });

        $("#filtre_rapport_solde_Du").on('change',function(){
            $('#one_date').hide(); 
        });
        
        $("#filtre_rapport_solde_Au").on('change',function(){
            $('#one_date').hide(); 
        });


        $("#rapportcompteepargnetrie_datearrete").on('change',function(){
                        
            $('#two_date').hide();
        });

        $("#rapportcompteepargnetrie_datedebut").on('change',function(){
            $('#one_date').hide(); 
        });
        
        $("#rapportcompteepargnetrie_datefin").on('change',function(){
            $('#one_date').hide(); 
        });

        

        ///Rapport credit iray mantolo
        $("#rapport_credit_datearrete").on('change',function(){
            $('#two_date').hide();
        });

        $("#rapport_credit_datedebut").on('change',function(){
            $('#one_date').hide(); 
        });
        
        $("#rapport_credit_datefin").on('change',function(){
            $('#one_date').hide(); 
        });
});

