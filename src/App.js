import { useState } from 'react';
import './App.css';
import { Navigate, Route, Routes } from 'react-router-dom';
import ScrollToTop from './Components/Common/ScrollToTop';
import Terms from './Components/Terms Page/Terms';
import Navbar from './Components/Common/Navbar Section/Navbar';
import Footer from './Components/Common/Footer Section/Footer';
import Contactus from './Components/Contact Us Page/Contactus';


function App() {
  const [isOpen, setIsOpen] = useState(false);

 const toggle = () => {
   setIsOpen(!isOpen);
 };
  return (
    <div className="App">
      <Navbar toggle={toggle}/>
       {/* <Sidebar isOpen={isOpen} toggle={toggle} /> */}
      <div style={{transition: 'opacity 0.3s ease-in-out'}}>
        <Routes>
          <Route path='/' element={<ScrollToTop></ScrollToTop>} />
          <Route path="*" element={<Navigate to="/" replace />} />
          <Route path='/contactus' element={<ScrollToTop><Contactus /></ScrollToTop>} />
          <Route path='/terms' element={<ScrollToTop><Terms /></ScrollToTop>} />
        </Routes>
    </div>
  <Footer />
    </div>
  );
}

export default App;
