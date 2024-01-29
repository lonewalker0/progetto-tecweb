/*******************/
/*    COPERTINA    */ 
/*******************/

// Margini pagina di copertina
#set page(
  margin: (
    right: 2.5cm,
    bottom: 1.5cm,
    top: 1.5cm,
  ),
)

#place(
  top + center,
  [#image("assets/newlogo.png", width: 40%)],
)
// Inserimento dettaglio giallo
#place(
  bottom + right,
  [
    #move(
      dx: 180pt,
      dy: 100pt,
      [
        #rotate(
          -30deg, 
          [
            #rect(width: 1000pt, height: 300pt, fill: rgb("#9b0014"), stroke: none)
          ]
        )
      ]
    )
  ],
)

// Inserimento logo UniPD
#place(
  bottom + right,
  [#image("assets/unipd_logo.png", width: 30%)],
)

#v(24%)
#set align(center)
#set text(16pt)
#set heading(outlined: false)



= TechnoLum250Festival
#set text(11pt)
Progetto Tecnologie Web 2023/2024

_Componenti_:\
Davide Malgarise 2009994\
Giacomo D'Ovidio 2009101\
Marco Piccoli 2045039\
Riccardo Alberto Costantin 2013451\

_Indirizzo sito web_:\
#link("http://tecweb.studenti.math.unipd.it/gdovidio")

_Credenziali utente_:\
username: user\
password: user

_Credenziali admin_:\
username: admin\
password: admin

_Email Referente_:\
#link("mailto:giacomo.dovidio@studenti.unipd.it")


#set page(
  
  footer: [
    #set align(center)
    #set text(13pt)
    #counter(page).display(
      "1 of 1",
      both: true,
    )
  ]
)

/****************/
/*    INDICE    */ 
/****************/

#pagebreak()

#set text(13pt)
#set heading(
  numbering: "1.1",
  outlined: true,
)

#show heading.where(level: 1): it => {
 

 pagebreak(weak: true)
 

 it
 
}
#show outline.entry.where(
  level: 1
): it => {
  v(12pt, weak: true)
  strong(it)
}

#outline(
  title: "Indice",
  indent: auto
)





/*******************/
/*    CONTENUTO    */ 
/*******************/

#pagebreak()
#set align(left)
#include "content.typ"