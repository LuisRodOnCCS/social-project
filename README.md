# Social Project

Proyecto para practicar la personalización de los componentes de jetstream y livewire.

El objetivo es lograr personalización de los usuarios donde en una unica columna json se guarde un objeto con las redes sociales del usuario y estás se muestren en la vista como para posteriormente mostrarse en una vista de detalle de usuario.

El problema es que al recuparar la columna json en el componente de UpdateUserInformation se imprime el objeto completo en lugar de mostrar únicamente la cadena correpondiente al campo.

Cosa que no sucede si en la tabla existen las columnas de cada red social, pero creo que es innecesario si se puede guardar todo en un solo campo.