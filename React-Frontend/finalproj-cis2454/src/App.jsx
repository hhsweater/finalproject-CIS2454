import { useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from './assets/vite.svg'
import heroImg from './assets/hero.png'
import './App.css'
import axios from 'axios';
import cors from 'cors';
import DisplayItems from './DisplayItems.jsx'
import DisplayStores from './DisplayStores.jsx'

function App() {
  const [count, setCount] = useState(0)
  const [itemsInput, setItemsInput] = useState({store_id: '', name: '', quantity:'', checked:''})
  const [storesInput, setStoresInput] = useState({name:''})

  const handleItemsChange = (e) => {
    setItemsInput({...itemsInput, [e.target.name]: e.target.value})
  }

  const handleStoresChange = (e) => {
    setStoresInput({...storesInput, [e.target.name]: e.target.value})
  }

  const handleItemsSubmit = async (e) => { //using axios to send the POST request
    e.preventDefault();
    try {
      await axios.post('http://localhost:5080/FinalProject-ShoppingList/models/items_1.php', itemsInput)
      alert('Item Success!')
      setItemsInput({store_id: '', name: '', quantity:'', checked:''})
    }catch(error){
      console.error('Error:', error)
    }
  }

  const handleStoresSubmit = async (e) => { //using axios to send the POST request
    e.preventDefault();
    try {
      await axios.post('http://localhost:5080/FinalProject-ShoppingList/models/stores_1.php', storesInput)
      alert('Store Success!')
      setStoresInput({name: ''})
    }catch(error){
      console.error('Error:', error)
    }
  }

  
  


  return (
    <>
      <section id="center">
        <div id="addforms">
        <h2>Add A New Item</h2>
        <form onSubmit={handleItemsSubmit}>
          <label>Store ID</label>
          <input type="number" name="store_id" placeholder="" value={itemsInput.store_id} onChange={handleItemsChange}/>
          <br/>
          <label>Item Name</label>
          <input type="text" name="name" placeholder="Item Name" value={itemsInput.name} onChange={handleItemsChange}/>
          <br/>
          <label>Item Quantity</label>
          <input type="number" name="quantity" placeholder="" value={itemsInput.quantity} onChange={handleItemsChange}/>
          <br/>
          <label>Checked? 0/1</label>
          <input type="number" name="checked" placeholder="" value={itemsInput.checked} onChange={handleItemsChange}/>
          <br/>
          <button type="submit">Submit</button>
        </form>
        <form onSubmit={handleStoresSubmit}>
          <h2>Add A New Store</h2>
          <label>Store Name</label>
          <input id="storename" type="text" name="name" placeholder="" value={storesInput.name} onChange={handleStoresChange}/>
          <button type="submit">Submit</button>
        </form>
          <br></br>
        </div>
        <div id="displayforms">
          {DisplayItems()}
          <br></br>
          {DisplayStores()}
        </div>
      </section>
      

      <div className="ticks"></div>

      <section id="next-steps">
        <div id="docs">
          <svg className="icon" role="presentation" aria-hidden="true">
            <use href="/icons.svg#documentation-icon"></use>
          </svg>
          <h2>Github</h2>
          <p>View the Github repository for this project</p>
          <ul>
            <li>
              <a href="https://github.com/hhsweater/finalproject-CIS2454" target="_blank">
                <img className="logo" src={viteLogo} alt="" />
                Github Link
              </a>
            </li>
            <li>
            </li>
          </ul>
        </div>
        <div id="social">
          <svg className="icon" role="presentation" aria-hidden="true">
            <use href="/icons.svg#social-icon"></use>
          </svg>
          <h2>Connect with ME</h2>
          <p>My Links</p>
          <ul>
            <li>
              <a href="https://github.com/hhsweater" target="_blank">
                <svg
                  className="button-icon"
                  role="presentation"
                  aria-hidden="true"
                >
                  <use href="/icons.svg#github-icon"></use>
                </svg>
                GitHub
              </a>
            </li>
            <li>
              <a href="https://x.com/hhswetr" target="_blank">
                <svg
                  className="button-icon"
                  role="presentation"
                  aria-hidden="true"
                >
                  <use href="/icons.svg#x-icon"></use>
                </svg>
                Twitter
              </a>
            </li>
            <li>
            </li>
          </ul>
        </div>
      </section>

      <div className="ticks"></div>
      <section id="spacer"></section>
    </>
  )
}

export default App
