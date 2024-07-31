# mikrodat2csv

Ez egy minimális proof-of-concept ami letükrözi a mikrodat jegyzőkönyvek metaadatait egy CSV-be (csak a jegyzőkönyveket, a meghívókat és határozatokat nem).

Itt meg az API dokumentáció amit eddig gyűjtöttem:


# Meghívók

## Meghívó évek


Endpoint: /app/cms/api/honlap/inv/years

Példa request: https://mikrodat.ujbuda.hu/app/cms/api/honlap/inv/years

Példa válasz:

```
  {"type":"SUCCESS","content":["2024","2023","2022","2021","2020","2019"]}
```

## Meghívó mappák (folders)

Endpoint: /app/cms/api/honlap/inv/folders
GET paraméterek: year
Példa request:
https://mikrodat.ujbuda.hu/app/cms/api/honlap/inv/folders?year=2024

Példa válasz:

```
  {
    "type": "SUCCESS",
    "content": [
      {
        "datum": "2024.01.10.",
        "nyilvanossagjelolo": "",
        "kategoria": "rendkívüli",
        "idopont": "10.00",
        "hely": "Polgármesteri Hivatal",
        "uuid": "e7c6cad6-adfd-11ee-a14c-e70a27390546"
      },
      {
        "datum": "2024.01.16.",
        "nyilvanossagjelolo": "",
        "kategoria": "rendkívüli",
        "idopont": "15.00",
        "hely": "Polgármesteri Hivatal",
        "uuid": "1f85bfb8-ae11-11ee-a14c-e70a27390546"
      }
    ]
  }
```

# Jegyzőkönyvek

## Jegyzőkönyv évek

Endpoint: /app/cms/api/honlap/jegy/years

Példa request: https://mikrodat.ujbuda.hu/app/cms/api/honlap/jegy/years

Példa válasz:

```
{"type":"SUCCESS","content":["2024","2023","2022","2021","2020","2019"]}
```

## Jegyzőkönyv mappák (folders)

Endpoint: /app/cms/api/honlap/jegy/folders
GET paraméterek: year

Példa request: https://mikrodat.ujbuda.hu/app/cms/api/honlap/jegy/folders?year=2024

Példa válasz:

```
  {
    "type": "SUCCESS",
    "content": [
      {
        "datum": "2024.01.10.",
        "kategoria": "rendkívüli",
        "idopont": "10.00",
        "hely": "Polgármesteri Hivatal",
        "uuid": "e7c6cad6-adfd-11ee-a14c-e70a27390546",
        "nev": "Gazdasági Bizottság"
      },
      {
        "datum": "2024.01.16.",
        "kategoria": "rendkívüli",
        "idopont": "15.00",
        "hely": "Polgármesteri Hivatal",
        "uuid": "1f85bfb8-ae11-11ee-a14c-e70a27390546",
        "nev": "Kulturális és Köznevelési  Bizottság"
      },
    ]
  }
```

## Folder részletek (detail)

Endpoint: /app/cms/api/honlap/detail
GET paraméterek: id - a folder uuid-je
Példa request:  https://mikrodat.ujbuda.hu/app/cms/api/honlap/detail?id=3dd07e6f-2885-11ef-a7ed-e70a27390546

Példa válasz:

```
  {
    "type": "SUCCESS",
    "content": {
      "datum": "2024.06.19.",
      "gyujto": "",
      "kategoria": "rendes",
      "folapra": "",
      "eloterjeszto": "",
      "targy": "",
      "napirend": "",
      "uuid": "3dd07e6f-2885-11ef-a7ed-e70a27390546",
      "nyilvanossagjelolo": "4DBue,4DBuh,4DBuj",
      "testuletijelolo": "0",
      "dateLastModified": "2024.07.08 16:49",
      "name": "2406191500gb",
      "idopont": "15:00",
      "hely": "Polgármesteri Hivatal",
      "nev": "Gazdasági Bizottság",
      "iktatoszam": ""
    }
  }
```

## Testületi meghívó

Endpoint: /app/cms/api/honlap/inv/test
GET paraméterek: id - a folder uuid-je

Példa request: https://mikrodat.ujbuda.hu/app/cms/api/honlap/inv/test?id=8ba08f48-4373-11ef-a7ed-e70a27390546

Példa válasz:

```
  {
      "type": "SUCCESS",
      "content": {
          "datum": "2024.07.31.",
          "nyilvanossagjelolo": "4DTue",
          "kategoria": "rendkívüli",
          "idopont": "11.00",
          "hely": "Polgármesteri Hivatal",
          "uuid": "8be4eb59-4373-11ef-a7ed-e70a27390546",
          "nev": "Képviselő-testület"
      }
  }
```


## Bizottsági meghívó

Endpoint: /app/cms/api/honlap/inv/biz
GET paraméterek: id - a folder uuid-je

Példa request: https://mikrodat.ujbuda.hu/app/cms/api/honlap/inv/biz?id=a57cdad5-4a65-11ef-a077-e70a27390546

Példa válasz:

```
  {
      "type": "SUCCESS",
      "content": [
          {
              "datum": "2024.07.31.",
              "nyilvanossagjelolo": "4DBue",
              "kategoria": "rendkívüli",
              "idopont": "08.00",
              "hely": "Polgármesteri Hivatal",
              "uuid": "a5cbbe36-4a65-11ef-a077-e70a27390546",
              "nev": "Jogi és Közbeszerzési Bizottság"
          }
      ]
  }
```

## Testületi meghívó napirend

Endpoint: /app/cms/api/honlap/inv/listtest
GET paraméterek: id - a meghívó uuid-je

Példa request: https://mikrodat.ujbuda.hu/app/cms/api/honlap/inv/listtest?id=8ba08f48-4373-11ef-a7ed-e70a27390546

Példa válasz:

```
{
    "type": "SUCCESS",
    "content": [
        {
            "gyujto": "",
            "nyilvanossagjelolo": "",
            "hasPermissions": true,
            "folapra": "",
            "eloterjeszto": "Dr. László Imre polgármester",
            "targy": "Meghívó",
            "name": "Meghívó_20240731.pdf",
            "napirend": "0",
            "uuid": "ea54aa25-4d89-11ef-a077-e70a27390546",
            "linkName": "e98ee913-4d89-11ef-a077-e70a27390546",
            "referencia": ""
        },
        {
            "gyujto": "",
            "nyilvanossagjelolo": "0",
            "hasPermissions": true,
            "folapra": "",
            "eloterjeszto": "Dr. László Imre polgármester",
            "targy": "A Magyarországi Evangéliumi Testvérközösség részére faállomány adományozása",
            "name": "Előterjesztés MET-adomány.pdf",
            "napirend": "4",
            "uuid": "2a62a29e-4d89-11ef-a077-e70a27390546",
            "linkName": "24dc2c1b-4d86-11ef-a077-e70a27390546",
            "referencia": "TEST"
        }
    ]
}
```

## Döntési javaslatok

Endpoint: /app/cms/api/honlap/elo/djav
GET paraméterek: uuid - a meghívó uuid-je, uuid2 - a napirendi pont uuid-je

https://mikrodat.ujbuda.hu/app/cms/api/honlap/elo/djav?uuid=8ba08f48-4373-11ef-a7ed-e70a27390546&uuid2=25ac459d-4d89-11ef-a077-e70a27390546

```
  {
    "type": "SUCCESS",
    "content": [
        {
            "gyujto": "1. Rendelettervezet",
            "nyilvanossagjelolo": "0",
            "dateLastModified": "2024.07.29 10:39",
            "statetext": "Publikált",
            "name": "Rendelettervezet.pdf",
            "userLastModified": "MarkoM",
            "filesize": 53,
            "uuid": "1e85db73-4d86-11ef-a077-e70a27390546"
        },
        {
            "gyujto": "3. Rendelettervezet 2. melléklete",
            "nyilvanossagjelolo": "0",
            "dateLastModified": "2024.07.29 10:39",
            "statetext": "Publikált",
            "name": "2. melléklet.pdf",
            "userLastModified": "MarkoM",
            "filesize": 61,
            "uuid": "1ecc8178-4d86-11ef-a077-e70a27390546"
        },
        {
            "gyujto": "2. Rendelettervezet 1. melléklete",
            "nyilvanossagjelolo": "0",
            "dateLastModified": "2024.07.29 10:39",
            "statetext": "Publikált",
            "name": "1. melléklet.pdf",
            "userLastModified": "MarkoM",
            "filesize": 11242,
            "uuid": "1f0e457d-4d86-11ef-a077-e70a27390546"
        }
    ]
  }
```

## Előterjesztés mellékletek

Endpoint: /app/cms/api/honlap/elo/att
GET paraméterek: uuid - a meghívó uuid-je, uuid2 - a napirendi pont uuid-je

https://mikrodat.ujbuda.hu/app/cms/api/honlap/elo/att?uuid=8ba08f48-4373-11ef-a7ed-e70a27390546&uuid2=25ac459d-4d89-11ef-a077-e70a27390546

```
  {
      "type": "SUCCESS",
      "content": [
          {
              "gyujto": "Hatásvizsgálati lap",
              "nyilvanossagjelolo": "0",
              "dateLastModified": "2024.07.29 10:39",
              "statetext": "Publikált",
              "name": "Hatásvizsgálati lap.pdf",
              "userLastModified": "MarkoM",
              "filesize": 269,
              "uuid": "1d97f8c4-4d86-11ef-a077-e70a27390546"
          },
          {
              "gyujto": "Állami Főépítész záróvéleménye",
              "nyilvanossagjelolo": "0",
              "dateLastModified": "2024.07.29 10:39",
              "statetext": "Publikált",
              "name": "Állami Főépítész záróvéleménye.pdf",
              "userLastModified": "MarkoM",
              "filesize": 571,
              "uuid": "1dd46599-4d86-11ef-a077-e70a27390546"
          }
      ]
  }
```


## Jegyzőkönyv (bizottság?)

Endpoint: /app/cms/api/honlap/jegy/biz
GET paraméterek: id - a folder uuid-je

Példa request: https://mikrodat.ujbuda.hu/app/cms/api/honlap/jegy/biz?id=3dd07e6f-2885-11ef-a7ed-e70a27390546

Példa válasz:

```
{
  "type": "SUCCESS",
  "content": [
    {
      "datum": "2024.06.19.",
      "nyilvanossagjelolo": "4DBue,4DBuh,4DBuj",
      "kategoria": "rendes",
      "idopont": "15.00",
      "hely": "Polgármesteri Hivatal",
      "uuid": "3e3274a0-2885-11ef-a7ed-e70a27390546",
      "nev": "Gazdasági Bizottság"
    }
  ]
}
```

## Jegyzőkönyv dokumentumok

Endpoint: /app/cms/api/honlap/jegy/list
GET paraméterek:

id  - a folder uuid-je
id2 - a "biz" uuid-je

Példa request:  https://mikrodat.ujbuda.hu/app/cms/api/honlap/jegy/list?id=3dd07e6f-2885-11ef-a7ed-e70a27390546&id2=3e3274a0-2885-11ef-a7ed-e70a27390546

Példa válasz:

```
  {
    "type": "SUCCESS",
    "content": [
      {
        "gyujto": "",
        "nyilvanossagjelolo": "0",
        "hasPermissions": true,
        "targy": "GB jegyzőkönyv 2024.06.19 NYILVÁNOS",
        "name": "GB jkv_20240619_nyilvános.pdf",
        "napirend": "0",
        "uuid": "20156d7f-3d39-11ef-a7ed-e70a27390546",
        "felelos": "Lados Tamás Gazdasági Bizottság elnök"
      },
      {
        "gyujto": "",
        "nyilvanossagjelolo": "1",
        "hasPermissions": false,
        "targy": "GB jegyzőkönyv 2024.06.19. ZÁRT",
        "name": "GB jkv_20240619_zárt.pdf",
        "napirend": "0",
        "uuid": "206429c8-3d39-11ef-a7ed-e70a27390546",
        "felelos": "Lados Tamás Gazdasági Bizottság elnök"
      }
    ]
  }
```

# Határozatok

Hasonló elvben mint az előzőeknél:

https://mikrodat.ujbuda.hu/app/cms/api/honlap/jegy/folders?year=2024

https://mikrodat.ujbuda.hu/app/cms/api/honlap/hat/list?id=459327c9-e791-11ee-a8db-e70a27390546&id2=45db064a-e791-11ee-a8db-e70a27390546

https://mikrodat.ujbuda.hu/app/cms/api/honlap/hat/biz?id=459327c9-e791-11ee-a8db-e70a27390546

https://mikrodat.ujbuda.hu/app/cms/api/honlap/detail?id=45db064a-e791-11ee-a8db-e70a27390546

## PDF letöltés

Endpoint: /app/cms/api/honlap/getfile/[uuid]/[name]

Példa request: https://mikrodat.ujbuda.hu/app/cms/api/honlap/getfile/20156d7f-3d39-11ef-a7ed-e70a27390546/GB%20jkv_20240619_nyilv%C3%A1nos.pdf
