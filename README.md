# Example API Structure in PHP - MVC for deploying in Vercel


## Example JSON Structure in Database Firebase 
#
    name-your-database
    ├── public              
    ├── private                 

- ```[public]``` -> Aqui crie as pastas/chaves que conterá os dados que pode ser público, acessado por qualquer usuário da Api.
- ```[private]``` -> Aqui crie as pastas/chaves que conterá os dados privados

### Example:

    name-your-database
    ├── public    
    │   └── posts  
    │   └── products  
    ├── private                
    │   └── users              
     