if ('Notification' in window) {
    Notification.requestPermission().then(function (permission) {
      if (permission === 'granted') {
        console.log('Permission granted');
      }
    });
  }


function enviarNotificacion(titulo,mensaje,url){
    if(Notification.permission === 'granted'){
        const notificacion = new Notification(titulo,{
            icon: 'https://prophysio.azurewebsites.net/images/icons/icono_app.png',
            body: mensaje,
        });

        notificacion.onclick = function(){
            window.open(url);
        }
    }
}
