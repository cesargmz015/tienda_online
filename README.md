# Tienda Online para Práctica CMS
Este proyecto es una página web de tipo tienda online creada como práctica para un Sistema de Gestión de Contenidos (CMS).

# Características
- Los usuarios pueden navegar por los productos disponibles en la tienda.
- Se puede cambiar de tipo de vista para la visualizacion de los articulos mediante un boton en el header.
- Al hacer click en un producto redirije a su pagina de detalles, en la que además se puede añadir el producto al carrito con una cantidad y añadir un comentario del producto que aparecerá en la pagina para el resto de usuarios también.
- Los usuarios pueden registrarse y logearse. al estar logeado, la pagina trabaja con la base de datos. Si no, la pagina trabaja con el localStorage (como para el carrito).
- En el boton de carrito se puede ver el carrito almacenado (según se esté logeado o no) y se puede eliminar el producto del carrito.
- En el boton administración se puede configurar toda la pagina desde el panel de admin al que solo puede acceder el admin o el usuario autorizado.
- Desde el panel de admin, se puede editar y eliminar todos los usuarios y articulos de la pagina web, ademas de crear e insertar nuevos articulos.
- Al crear nuevos articulos, se puede subir la imagen del articulo. 
- <b>(IMPORTANTE: la pagina de index.php e index2.php estan configuradas para que cada vez que se recargan muestren aleatoriamente las imagenes de los productos guardadas entre todos los productos para hacerla mas divertida, por lo que las imagenes de los productos no se corresponden con la imagen de cada producto en sí; pero esto no seria una situacion real logicamente(para que no lleve a confusión al crear un nuevo artículo y no ver la imagen del articulo con el articulo que correspondería.))</b>

# Tecnologías Utilizadas
- HTML, CSS y JavaScript para la UI (frontend).
- PHP para el backend.
- MySQL para la base de datos.
- AJAX para la actualización dinámica.

# Inicio y ejecucion de la pagina web
- Puerto MySQL utilizado: 3306.
- Para iniciar el proyecto, primero importe el archivo SQL desde la carpeta database.
- Después navegue a `tienda_online/src/php/index.php` para iniciar desde el index.
- Para logearse como admin el usuario es: admin@gmail.com; y la contraseña: 123456789.
  
# Creada por:
César Gómez Arroyo - 2023
@cesargmz015

# Licencia
Este proyecto está bajo la licencia MIT.