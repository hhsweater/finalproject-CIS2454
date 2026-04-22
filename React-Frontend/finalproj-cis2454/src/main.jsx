import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import './index.css'
import App from './App.jsx'
import DisplayItems from './DisplayItems.jsx'
import DisplayStores from './DisplayStores.jsx'

createRoot(document.getElementById('root')).render(
  <StrictMode>
   
    <App />
  </StrictMode>,
)
