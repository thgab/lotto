/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$('input[name="lottery[]"]').on('change', function(e) {
   if($('input[name="lottery[]"]:checked').length > 5) {
       this.checked = false;
   }
});


