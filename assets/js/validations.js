

const loginBtn = document.getElementById('login');

loginBtn.addEventListener('click', e => {
    const email = document.getElementById('email').value;
    const passwd = document.getElementById('password').value;
    
    console.log(email);

    const formData = new FormData();

    formData.append( 'email', email );
    formData.append( 'password', passwd );
    
    const request = new XMLHttpRequest();
    request.open( 'POST', '../../controllers/login.controller.php', true );
    request.onreadystatechange = function(e) {
        if ( request.readyState == 4 ) {
            if ( request.status == 200 ) {
                if ( !(request.responseText === 'error_login') ) {
                    alert(request.responseText);
                    window.location.href = request.responseText;
                }else {
                    console.log('fallo');
                }
            }
        }
    }
    request.send(formData);
})