import { useState } from 'react'
import { BrowserRouter, Routes, Route } from 'react-router-dom'
import './App.scss'
import UserMainMenu from './components/mainmenu/UserMainMenu'

function App() {
  const [count, setCount] = useState(0)

  return (
    <BrowserRouter basename='/app'>
      <Routes>
        <Route path="*" element={<UserMainMenu/>}/>
        <Route path="/" element={<UserMainMenu/>}/>
      </Routes>
    </BrowserRouter>
  )
}

export default App
