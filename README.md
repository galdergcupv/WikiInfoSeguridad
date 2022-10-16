## Integrantes del grupo:
- *Galder García*
---
## Intrucciones de uso:
1. Sitúa la terminal dentro del repositorio /WikiInfoSeguridad/entrega_1
2. Construye la imagen **web1**:
```
$ docker build -t="web1" .
```
3. Despliega los servicios mediante:
```
$ docker-compose up
```
4. Vsita http://localhost:8890/ (usuario “admin”, password “test”). Haz click en “database” y luego en “import”,
desde donde elegimos el archivo **wikiseguridad_db.sql** (recomendado) o **wikiseguridad_db_VACIO.sql** (si queremos las tablas vacías).
5. Visita la web en http://localhost:81.
![Image](https://i.imgur.com/ot1LJ7m.png)
- Para parar los servicios, en otra terminal:
```
$ docker-compose down
```