// register
function alrHave() {
  let register = document.getElementById('registers')
  let logins = document.getElementById('login-session')

  register.style.display = "none"
  logins.style.display = "block"
}
  
  
  $(document).ready(function() {
  
    $(".btn-register").click( function() {
    
      var fullname = $("#fullname").val();
      var username = $("#username").val();
      var password    = $("#password").val();
      
  
      if (fullname.length == "") {
  
        Swal.fire({
          type: 'warning',
          title: 'Oops...',
          text: 'Nama Lengkap Wajib Diisi !'
        });
  
      } else if(username.length == "") {
  
        Swal.fire({
          type: 'warning',
          title: 'Oops...',
          text: 'Username Wajib Diisi !'
        });
  
      } else if(password.length == "") {
  
        Swal.fire({
          type: 'warning',
          title: 'Oops...',
          text: 'Password Wajib Diisi !'
        });
  
      } else {
  
        //ajax
        $.ajax({
  
          url: "simpan-register.php",
          type: "POST",
          data: {
              "fullname": fullname,
              "username": username,
              "password": password
          },
  
          success:function(response){
  
            if (response == "success") {
  
              Swal.fire({
                type: 'success',
                title: 'Register Berhasil!',
                text: 'silahkan login!'
              });
  
              $("#fullname").val('');
              $("#username").val('');
              $("#password").val('');
  
            } else {
  
              Swal.fire({
                type: 'error',
                title: 'Register Gagal!',
                text: 'Username Sudah Diambil!'
              });
  
            }
  
            console.log(response);
  
          },
  
          error:function(response){
              Swal.fire({
                type: 'error',
                title: 'Opps!',
                text: 'server error!'
              });
          }
  
        })
  
      }
  
    }); 
  
  });
// login
$(document).ready(function() {

  $(".btn-login").click( function() {
      
        var username = $("#usernames").val();
        var password = $("#passwords").val();
  
        if(username.length == "") {
  
          Swal.fire({
            type: 'warning',
            title: 'Oops...',
            text: 'Username Wajib Diisi !'
          });
  
        } else if(password.length == "") {
  
          Swal.fire({
            type: 'warning',
            title: 'Oops...',
            text: 'Password Wajib Diisi !'
          });
  
        } else {
  
          $.ajax({
  
            url: "cek-login.php",
            type: "POST",
            data: {
                "username": username,
                "password": password
            },
  
            success:function(response){
  
              if (response == "success") {
                Swal.fire({
                  type: 'success',
                  title: 'Welcome Back ' + document.getElementById('usernames').value,
                  text: 'Hello ' + document.getElementById('usernames').value + ' Anda akan di arahkan dalam 5 Detik',
                  timer: 5000,
                  showCancelButton: false,
                  showConfirmButton: false
                })
                .then (function() {
                  window.location.href = "game.php";
                });
  
              } else {
  
                Swal.fire({
                  type: 'error',
                  title: 'Login Gagal!',
                  text: 'silahkan coba lagi!'
                });
  
              }
  
              console.log(response);
  
            },
  
            error:function(response){
  
                Swal.fire({
                  type: 'error',
                  title: 'Opps!',
                  text: 'server error!'
                });
  
                console.log(response);
  
            }
  
          });
  
        }
  
      });
  
    });