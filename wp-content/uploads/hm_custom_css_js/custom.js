(function($){$(document).ready(function(){$('form').on('submit',function(event){let isValid=!0;const emailField=$(this).find('input[type="email"]');emailField.each(function(){const emailValue=$(this).val().trim();const emailRegex=/^[a-zA-Z0-9._%+-]+@gmail\.com$/;if(!emailRegex.test(emailValue)){isValid=!1;showError($(this),'Please enter a valid Gmail address.')}else{removeError($(this))}});if(!isValid){event.preventDefault();return !1}});$('form').find('input, textarea, select').on('click',function(){removeError($(this))});function showError(field,message){removeError(field);field.css('border-color','red');const errorText=$('<div>',{class:'email-error',text:message,css:{color:'red',fontSize:'12px',marginTop:'5px'}});field.after(errorText)}
function removeError(field){field.siblings('.email-error').remove();field.css('border-color','')}})})(jQuery)