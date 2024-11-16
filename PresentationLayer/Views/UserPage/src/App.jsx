 import { BrowserRouter, Routes, Route } from 'react-router-dom'
import './App.scss'
import UserMainMenu from './components/mainmenu/UserMainMenu'
import Student from './components/student/Student'
import Teacher from './components/teacher/Teacher'
import Configurations from './components/configurations/Configurations';

function App() {
  return (
    <BrowserRouter basename='/app'>
      <Routes>
        <Route path="*" element={<UserMainMenu/>}/>
        <Route path="/" element={<UserMainMenu/>}/>
        <Route path="/student" element={<Student/>}/>
        <Route path='/teacher' element={<Teacher/>}/>
        <Route path='/configurations' element={<Configurations/>}/>
      </Routes>
    </BrowserRouter>
  )
}

export default App
