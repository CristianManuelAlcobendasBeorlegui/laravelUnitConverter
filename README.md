# Laravel Unit Converter

## Descripción
Proyecto Laravel de prueba que implementa 5 endpoints de una API que convierte unas unidades a otras.

## Endpoints
### 1. Longitud
**_Petición HTTP:_**
```bash
{Schema}://{FQDN}/api/converter/length/{value}/{unit}
```

**Parámetros:**
- **`value`**: Un número superior a 0.
- **`unit`**: La unidad en la que se encuentra el valor **value**. [`METERS` o `FEETS`]

**_Ejemplo:_**

Petición HTTP:
```txt
http://localhost:8000/api/converter/length/1/FEETS
```

Respuesta:
```json
{
    "code": 200,
    "content": {
        "value": 1,
        "unit": "FEETS",
        "valueConverted": 0.3048,
        "valueConvertedTo": "METERS",
        "msg": "1 FEET are 0.3048 METERS."
    }
}
```

---

### 2. Peso
**_Petición HTTP:_**
```bash
{Schema}://{FQDN}/api/converter/weight/{value}/{unit}
```

**Parámetros:**
- **`value`**: Un número superior a 0.
- **`unit`**: La unidad en la que se encuentra el valor **value**. [`KILOGRAMS` o `POUNDS`]

**_Ejemplo:_**

Petición HTTP:
```txt
http://localhost:8000/api/converter/weight/2/KILOGRAMS
```

Respuesta:
```json
{
    "code": 200,
    "content": {
        "value": 2,
        "unit": "KILOGRAMS",
        "valueConverted": 4.409246,
        "valueConvertedTo": "POUNDS",
        "msg": "2 KILOGRAMS are 4.409246 POUNDS."
    }
}
```

---

### 3. Temperatura
**_Petición HTTP:_**
```bash
{Schema}://{FQDN}/api/converter/temperature/{value}/{unit}
```

**Parámetros:**
- **`value`**: Un número superior a 0.
- **`unit`**: La unidad en la que se encuentra el valor **value**. [`CELSIUS` o `FAHRENHEIT`]

**_Ejemplo:_**

Petición HTTP:
```txt
http://localhost:8000/api/converter/temperature/15/FAHRENHEIT
```

Respuesta:
```json
{
    "code": 200,
    "content": {
        "value": 15,
        "unit": "FAHRENHEIT",
        "valueConverted": -9.444444444444445,
        "valueConvertedTo": "CELSIUS",
        "msg": "15 FAHRENHEIT degrees are -9.4444444444444 CELSIUS degrees."
    }
}
```

---

### 4. Volumen
**_Petición HTTP:_**
```bash
{Schema}://{FQDN}/api/converter/volume/{value}/{unit}
```

**Parámetros:**
- **`value`**: Un número superior a 0.
- **`unit`**: La unidad en la que se encuentra el valor **value**. [`LITRES` o `GALLONS`]

**_Ejemplo:_**

Petición HTTP:
```txt
http://localhost:8000/api/converter/volume/3/LITRES
```

Respuesta:
```json
{
    "code": 200,
    "content": {
        "value": 3,
        "unit": "LITRES",
        "valueConverted": 0.6599076,
        "valueConvertdTo": "GALLONS",
        "msg": "3 LITRES are 0.6599076 GALLONS."
    }
}
```

---

### 5. Velocidad
**_Petición HTTP:_**
```bash
{Schema}://{FQDN}/api/converter/speed/{value}/{unit}
```

**Parámetros:**
- **`value`**: Un número superior a 0.
- **`unit`**: La unidad en la que se encuentra el valor **value**. [`KILOMETERS` o `MILES`]

**_Ejemplo:_**

Petición HTTP:
```txt
http://localhost:8000/api/converter/speed/2/MILES
```

Respuesta:
```json
{
    "code": 200,
    "content": {
        "value": 2,
        "unit": "MILES",
        "valueConverted": 3.218688,
        "valueConvertedTo": "KILOMETERS",
        "msg": "2 MILES are 3.218688 KILOMETERS."
    }
}
```