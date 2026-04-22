import { useEffect, useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from './assets/vite.svg'
import heroImg from './assets/hero.png'
import './App.css'
import axios from 'axios';
import cors from 'cors';

function DisplayStores() {
console.log('Successfuly called display stores:')
  const [stores, setStores] = useState([])

  useEffect(() => {
    const fetchStores = async () => {
      try {
        const response = await axios.get('http://localhost:5080/FinalProject-ShoppingList/models/stores_1.php')
        console.log('Successfuly Fetched stores:')
        setStores(response.data);
      } catch (error) {
        console.error('Error fetching stores:', error)
      }
    };
    fetchStores()
  }, [])

  return (
    <table>
      <thead>
        <tr>
          <th>Store ID</th>
          <th>Store Name</th>
        </tr>
      </thead>
      <tbody>
        {stores.map((store) => (
          <tr key={store.id}>
            <td>{store.id}</td>
            <td>{store.name}</td>
          </tr>
        ))}
      </tbody>
    </table>
    
  )
} 
export default DisplayStores