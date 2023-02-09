let getData = async (isbn) =>{
    let tab=[]
     await fetch('https://openlibrary.org/api/books?bibkeys=ISBN:'+isbn+'&jscmd=data&format=json').then(resp=>resp.json())
    .then(data=>{
     tab[0]=data['ISBN:'+isbn]['cover']['medium'];
     tab[1]=data['ISBN:'+isbn]['title']
  })
  return tab
  }
class Book{ // un Livre a pour attributs: image, title, ISBN
  
  constructor(isbn,image,title){
    this.isbn=isbn;
    this.image = image
    this.title=title
  
}
}

isbnTrendsLivres=[9780980200447,1473616689,9780670031764,9780670031764,9780670031764,9780670031764,9780670031764] //Ajouter l'isbn d'un livre dans ce tableau pour l'ajouter dans les trends


isbnTopLivres=[9780980200447,1473616689,9780670031764,9780670031764,9780670031764,9780670031764,9780670031764,9780670031764,9780670031764] //Ajouter l'isbn d'un livre dans ce tableau pour l'ajouter dans les Best books
 topLivres=[]
 let loadTrends=  (isbnTrendsLivres) =>{
     let trendsLivres=[]
for(let i of isbnTrendsLivres){
    fetch('https://openlibrary.org/api/books?bibkeys=ISBN:'+i+'&jscmd=data&format=json').then(resp=>resp.json())
    .then(data=>{
      trendsLivres.push(  new Book(i,data['ISBN:'+i]['cover']['medium'],data['ISBN:'+i]['title']))
       $("#testImage").clone().css('background-image','url('+trendsLivres[trendsLivres.length-1].image+')').appendTo("#trends");
  })
   
 }
 return trendsLivres
}

document.addEventListener("DOMContentLoaded",  function() {
 /*for(let i of isbnTopLivres){
   topLivres.push(new Book(i))
 }
  topLivres.map(m=>{
 $("#testImage").clone().css('background-image','url('+m[m.length-1].image+')').appendTo("#trends");
 });
 */
let trendsLivres =   loadTrends(isbnTrendsLivres)//insère les livres trends dans la section et retourne un tableau de book 


});  
