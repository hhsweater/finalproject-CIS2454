import { useEffect, useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from './assets/vite.svg'
import heroImg from './assets/hero.png'
import './App.css'
import axios from 'axios';
import cors from 'cors';

function DisplayItems() {
console.log('Successfuly called display items:')
  const [items, setItems] = useState([])

  useEffect(() => {
    const fetchItems = async () => {
      try {
        const response = await axios.get('http://localhost:5080/FinalProject-ShoppingList/models/items_1.php')
        console.log('Successfuly Fetched items:')
        setItems(response.data);
      } catch (error) {
        console.error('Error fetching Items:', error)
      }
    };
    fetchItems()
  }, [])

  return (
    <table>
      <thead>
        <tr>
          <th>Item ID</th>
          <th>Store ID</th>
          <th>Name</th>
          <th>Quantity</th>
          <th>Checked Status</th>
        </tr>
      </thead>
      <tbody>
        {items.map((item) => (
          <tr key={item.id}>
            <td>{item.id}</td>
            <td>{item.store_id}</td>
            <td>{item.name}</td>
            <td>{item.quantity}</td>
            <td>{item.checked}</td>
          </tr>
        ))}
      </tbody>
    </table>
    
  )
} 
export default DisplayItems